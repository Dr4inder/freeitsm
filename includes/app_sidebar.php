<?php
/**
 * The optional module sidebar (discussion #124): a rail of module icons down the
 * left of every analyst screen, for anybody who would rather see their modules
 * than open the waffle each time.
 *
 * - OFF unless the analyst turns it on (Preferences -> Display -> Sidebar). The
 *   waffle stays exactly as it is either way.
 * - The analyst ticks which modules it holds; it only ever offers modules they
 *   can open, and it follows THEIR module order (GH #187) - the same
 *   analystVisibleModules() list the waffle, the home page and ⌘K draw from, so
 *   they can never disagree.
 * - Desktop only. A phone keeps its compact menu; assets/css/app-sidebar.css
 *   hides the rail below 768px and the page never moves there.
 *
 * Preferences (user_preferences):
 *   app_sidebar          '1' = on; anything else = off
 *   app_sidebar_modules  JSON array of the module keys ticked; absent = every module
 *
 * Drawn by renderWaffleMenuPanel(), which every analyst header already calls,
 * so no page needs editing to have it.
 *
 * @wiki App-Sidebar
 */

require_once __DIR__ . '/display_order.php';

/**
 * The signed-in analyst's sidebar settings: ['on' => bool, 'modules' => ?array].
 * 'modules' null means "never chosen" = every module. Read once per request.
 */
function appSidebarPrefs(): array
{
    static $memo = null;
    if ($memo !== null) return $memo;
    $memo = ['on' => false, 'modules' => null];
    $aid = (int)($_SESSION['analyst_id'] ?? 0);
    if ($aid <= 0 || !function_exists('connectToDatabase')) return $memo;
    try {
        $st = connectToDatabase()->prepare(
            "SELECT preference_key, preference_value FROM user_preferences
              WHERE analyst_id = ? AND preference_key IN ('app_sidebar', 'app_sidebar_modules')"
        );
        $st->execute([$aid]);
        $rows = $st->fetchAll(PDO::FETCH_KEY_PAIR);
        $memo['on'] = ($rows['app_sidebar'] ?? '') === '1';
        if (isset($rows['app_sidebar_modules']) && $rows['app_sidebar_modules'] !== '') {
            $memo['modules'] = displayOrderParse($rows['app_sidebar_modules']);
        }
    } catch (Throwable $e) {
        // No preferences table yet: no sidebar.
    }
    return $memo;
}

/**
 * The modules on this analyst's sidebar, in their module order: the ones they
 * can open, narrowed to the ones they ticked.
 *
 * @param array $modules  the $modules list from includes/waffle-menu.php
 */
function appSidebarModules(array $modules): array
{
    $prefs = appSidebarPrefs();
    $out = [];
    foreach (analystVisibleModules($modules) as $key => $module) {
        if ($prefs['modules'] !== null && !in_array($key, $prefs['modules'], true)) continue;
        $out[$key] = $module;
    }
    return $out;
}

/**
 * Print the sidebar, when this analyst has it on.
 *
 * @param array $modules  the $modules list from includes/waffle-menu.php
 * @param mixed $current_module  the key of the module being shown, marked as current
 */
function renderAppSidebar(array $modules, $current_module): void
{
    if (!appSidebarPrefs()['on']) return;
    $h = fn($s) => htmlspecialchars((string)$s, ENT_QUOTES);
    $recent = t('common.waffle.tab_recent');
    $choose = t('common.sidebar.customise');
    ?>
    <link rel="stylesheet" href="<?php echo $h(BASE_URL); ?>assets/css/app-sidebar.css?v=2">
    <nav class="app-sidebar" aria-label="<?php echo $h(t('common.sidebar.label')); ?>">
        <div class="app-sidebar-modules">
            <?php foreach (appSidebarModules($modules) as $key => $module): ?>
            <a href="<?php echo $h(BASE_URL . $module['path']); ?>" class="app-sidebar-link<?php echo $key === $current_module ? ' current' : ''; ?>"
               title="<?php echo $h($module['name']); ?>" aria-label="<?php echo $h($module['name']); ?>"<?php echo $key === $current_module ? ' aria-current="page"' : ''; ?>>
                <span class="waffle-module-icon <?php echo $h($key); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $module['icon']; ?></svg>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="app-sidebar-foot">
            <button type="button" class="app-sidebar-tool" onclick="appSidebarRecent(event)" title="<?php echo $h($recent); ?>" aria-label="<?php echo $h($recent); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 14"/></svg>
            </button>
            <a class="app-sidebar-tool" href="<?php echo $h(BASE_URL); ?>system/preferences/#app-sidebar" title="<?php echo $h($choose); ?>" aria-label="<?php echo $h($choose); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="20" y2="18"/><circle cx="9" cy="6" r="2"/><circle cx="15" cy="12" r="2"/><circle cx="7" cy="18" r="2"/></svg>
            </a>
        </div>
    </nav>
    <script>
    /** The rail's Recent button: the waffle's own Recent trail, so there is one list of where you have been. */
    function appSidebarRecent(e) {
        e.stopPropagation();
        if (typeof toggleWaffleMenu !== 'function') return;
        const panel = document.getElementById('wafflePanel');
        if (!panel || !panel.classList.contains('active')) toggleWaffleMenu();
        if (typeof waffleShowTab === 'function') waffleShowTab('recent');
    }
    </script>
    <?php
}
