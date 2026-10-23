<?php
/**
 * Reconciliation you can review (GH #200 part D).
 *
 * FreeITSM's matching already refuses to guess: two assets sharing a serial are
 * never chosen between, a reused hostname becomes a new asset, and a peripheral a
 * tool reports that matches no asset is not created. Each of those used to end in
 * silence or a history line. This keeps them as cases in asset_review_items for a
 * person to decide - the same case is one row however often it is seen again
 * (match_key), and a decision sticks.
 *
 * Kinds:
 *   unmatched_peripheral  a REST source reported a connection to a serial no asset has
 *   ambiguous_match       ...to a serial two or more assets share
 *   hostname_reused       an agent found a new machine wearing an old one's name
 *   shared_serial         two assets in one company with the same usable serial
 *
 * @wiki Asset-Review-Developer-Guide
 */
final class AssetReviewService
{
    public const KINDS = ['unmatched_peripheral', 'ambiguous_match', 'hostname_reused', 'shared_serial'];

    /**
     * Keep a case for review, or note that it was seen again. A case a person has
     * already decided stays decided.
     *
     * @param string $matchKey what makes two sightings the same case, e.g. 'peripheral:rest:lansweeper:42:ABC123'
     */
    public static function record(PDO $conn, int $tenantId, string $kind, string $matchKey, ?int $assetId, ?int $otherAssetId,
                                  ?string $source, ?string $detail): void
    {
        if (!self::ready($conn)) { return; }
        $conn->prepare("INSERT INTO asset_review_items (tenant_id, kind, match_key, asset_id, other_asset_id, source, detail, first_seen_at, last_seen_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, UTC_TIMESTAMP(), UTC_TIMESTAMP())
            ON DUPLICATE KEY UPDATE last_seen_at = VALUES(last_seen_at), detail = VALUES(detail),
                status = IF(status = 'resolved', 'open', status), resolved_at = IF(status = 'open', NULL, resolved_at)")
            ->execute([$tenantId, $kind, mb_substr($matchKey, 0, 191), $assetId, $otherAssetId, $source, $detail === null ? null : mb_substr($detail, 0, 1000)]);
    }

    /** The case sorted itself out (the peripheral now matches an asset): close it, if it is still open. */
    public static function settle(PDO $conn, int $tenantId, string $matchKey): void
    {
        if (!self::ready($conn)) { return; }
        $conn->prepare("UPDATE asset_review_items SET status = 'resolved', resolved_at = UTC_TIMESTAMP(), resolved_by_id = NULL
            WHERE tenant_id = ? AND match_key = ? AND status = 'open'")->execute([$tenantId, mb_substr($matchKey, 0, 191)]);
    }

    /** Before Database Verification has created the table, nothing is kept - and nothing fails. */
    public static function ready(PDO $conn): bool
    {
        static $ready = null;
        if ($ready === null) {
            try { $conn->query('SELECT 1 FROM asset_review_items LIMIT 0'); $ready = true; }
            catch (Throwable $e) { $ready = false; }
        }
        return $ready;
    }
}
