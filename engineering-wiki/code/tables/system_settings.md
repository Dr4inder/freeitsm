# system_settings

## Columns

| Column | Definition | Notes |
|---|---|---|
| `setting_key` | `VARCHAR(100) NOT NULL` |  |
| `setting_value` | `LONGTEXT NULL` |  |
| `updated_datetime` | `DATETIME NULL DEFAULT CURRENT_TIMESTAMP` |  |

## Written by

| File | In | Does | Columns | Purpose |
|---|---|---|---|---|
| [api/assets/save_asset_label_settings.php](/code/files/api/assets/save_asset_label_settings.php.md):144 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md):70 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/assets/save_asset_tag_settings.php](/code/files/api/assets/save_asset_tag_settings.php.md):77 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/cmdb/save_ai_settings.php](/code/files/api/cmdb/save_ai_settings.php.md):34 |  | insert | `setting_key`, `setting_value` |  |
| [api/forms/save_ai_settings.php](/code/files/api/forms/save_ai_settings.php.md):39 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/forms/save_settings.php](/code/files/api/forms/save_settings.php.md):58 |  | update | `setting_value`, `updated_datetime` |  |
| [api/forms/save_settings.php](/code/files/api/forms/save_settings.php.md):62 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/knowledge/assistant_settings.php](/code/files/api/knowledge/assistant_settings.php.md):58 |  | insert | `setting_key`, `setting_value` |  |
| [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md):113 | `handlePreview` | insert | `setting_key`, `setting_value` |  |
| [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md):143 | `handlePreview` | insert | `setting_key`, `setting_value` |  |
| [api/knowledge/permission_model.php](/code/files/api/knowledge/permission_model.php.md):166 | `handleSet` | insert | `setting_key`, `setting_value` |  |
| [api/knowledge/save_email_settings.php](/code/files/api/knowledge/save_email_settings.php.md):116 |  | update | `setting_value`, `updated_datetime` |  |
| [api/knowledge/save_email_settings.php](/code/files/api/knowledge/save_email_settings.php.md):122 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/messaging/save_base_url.php](/code/files/api/messaging/save_base_url.php.md):46 |  | insert | `setting_key`, `setting_value` |  |
| [api/rfp-builder/save_ai_settings.php](/code/files/api/rfp-builder/save_ai_settings.php.md):63 |  | update | `setting_value`, `updated_datetime` |  |
| [api/rfp-builder/save_ai_settings.php](/code/files/api/rfp-builder/save_ai_settings.php.md):66 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/service-status/save_uptime_settings.php](/code/files/api/service-status/save_uptime_settings.php.md):43 |  | insert | `setting_key`, `setting_value` |  |
| [api/settings/save_system_settings.php](/code/files/api/settings/save_system_settings.php.md):86 |  | update | `setting_value`, `updated_datetime` |  |
| [api/settings/save_system_settings.php](/code/files/api/settings/save_system_settings.php.md):89 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/system/calendar_sync.php](/code/files/api/system/calendar_sync.php.md):235 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):2011 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):2034 |  | update | `setting_value` |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md):3640 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/managers.php](/code/files/api/system/managers.php.md):69 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/portal_profile.php](/code/files/api/system/portal_profile.php.md):78 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/system/save_branding.php](/code/files/api/system/save_branding.php.md):55 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/save_module_permission_mode.php](/code/files/api/system/save_module_permission_mode.php.md):21 |  | insert | `setting_key`, `setting_value` |  |
| [api/system/self_service_portal.php](/code/files/api/system/self_service_portal.php.md):151 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/system/service_status_portal.php](/code/files/api/system/service_status_portal.php.md):49 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/system/tika_settings.php](/code/files/api/system/tika_settings.php.md):26 | `tikaSettingPut` | insert | `setting_key`, `setting_value` |  |
| [api/tasks/save_settings.php](/code/files/api/tasks/save_settings.php.md):114 |  | update | `setting_value` |  |
| [api/tasks/save_settings.php](/code/files/api/tasks/save_settings.php.md):118 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/oversize_settings.php](/code/files/api/tickets/oversize_settings.php.md):45 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_checklist_settings.php](/code/files/api/tickets/save_checklist_settings.php.md):64 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/tickets/save_csat_settings.php](/code/files/api/tickets/save_csat_settings.php.md):50 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_inbox_display.php](/code/files/api/tickets/save_inbox_display.php.md):64 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_mandatory_fields_settings.php](/code/files/api/tickets/save_mandatory_fields_settings.php.md):83 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/tickets/save_public_base_url.php](/code/files/api/tickets/save_public_base_url.php.md):56 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_reply_cleanup_settings.php](/code/files/api/tickets/save_reply_cleanup_settings.php.md):41 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_sla_global_settings.php](/code/files/api/tickets/save_sla_global_settings.php.md):70 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/tickets/save_ticket_classification_settings.php](/code/files/api/tickets/save_ticket_classification_settings.php.md):60 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/save_time_tracking_settings.php](/code/files/api/tickets/save_time_tracking_settings.php.md):53 |  | insert | `setting_key`, `setting_value` |  |
| [api/tickets/set_base_url_warning_dismissed.php](/code/files/api/tickets/set_base_url_warning_dismissed.php.md):52 |  | insert | `setting_key`, `setting_value` |  |
| [api/watchtower/save_settings.php](/code/files/api/watchtower/save_settings.php.md):111 |  | insert | `setting_key`, `setting_value` |  |
| [api/workflow/save_ai_settings.php](/code/files/api/workflow/save_ai_settings.php.md):43 |  | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [api/workflow/save_payload_retention.php](/code/files/api/workflow/save_payload_retention.php.md):42 |  | insert | `setting_key`, `setting_value` |  |
| [cron/attachment_extract.php](/code/files/cron/attachment_extract.php.md):92 |  | insert | `setting_key`, `setting_value` |  |
| [cron/integration_poll.php](/code/files/cron/integration_poll.php.md):87 |  | insert | `setting_key`, `setting_value` |  |
| [cron/task_recurrence.php](/code/files/cron/task_recurrence.php.md):81 |  | insert | `setting_key`, `setting_value` |  |
| [cron/webhook_deliveries.php](/code/files/cron/webhook_deliveries.php.md):69 |  | insert | `setting_key`, `setting_value` |  |
| [cron/workflow_scheduled.php](/code/files/cron/workflow_scheduled.php.md):83 |  | insert | `setting_key`, `setting_value` |  |
| [includes/ai_provider.php](/code/files/includes/ai_provider.php.md):796 | `aiProviderListOpenRouterModels` | insert | `setting_key`, `setting_value` |  |
| [includes/ai_settings.php](/code/files/includes/ai_settings.php.md):241 | `aiSettingsSave` | update | `setting_value` |  |
| [includes/ai_settings.php](/code/files/includes/ai_settings.php.md):244 | `aiSettingsSave` | insert | `setting_key`, `setting_value` |  |
| [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md):255 | `awcSetSetting` | insert | `setting_key`, `setting_value` |  |
| [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md):112 | `domainRdapBootstrap` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md):330 | `domainWhoisServer` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/domains/settings.php](/code/files/includes/domains/settings.php.md):168 | `domainSettingWrite` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/files/storage.php](/code/files/includes/files/storage.php.md):38 | `filesSaveSetting` | insert | `setting_key`, `setting_value` |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md):76 | `lmsCtSaveSetting` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md):95 | `lmsReminderSaveSetting` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md):281 | `projectAlertsOpportunistic` | insert | `setting_key`, `setting_value` |  |
| [includes/projects/settings.php](/code/files/includes/projects/settings.php.md):179 | `projectSettingWrite` | insert | `setting_key`, `setting_value`, `updated_datetime` |  |
| [includes/warroom.php](/code/files/includes/warroom.php.md):1224 | `warRoomSweepOrphanFiles` | insert | `setting_key`, `setting_value` |  |

## Read by

| File | Where | Purpose |
|---|---|---|
| [api/assets/debug_vcenter.php](/code/files/api/assets/debug_vcenter.php.md) | L37 |  |
| [api/assets/get_vcenter.php](/code/files/api/assets/get_vcenter.php.md) | L30 |  |
| [api/auth/oidc_login.php](/code/files/api/auth/oidc_login.php.md) | L39 |  |
| [api/auth/resolve_login.php](/code/files/api/auth/resolve_login.php.md) | L39 |  |
| [api/change-management/send_share_email.php](/code/files/api/change-management/send_share_email.php.md) | L45 |  |
| [api/cmdb/_ai_helpers.php](/code/files/api/cmdb/_ai_helpers.php.md) | loadCmdbAiConfig L23 |  |
| [api/cmdb/get_ai_settings.php](/code/files/api/cmdb/get_ai_settings.php.md) | L28 |  |
| [api/cmdb/test_ai_key.php](/code/files/api/cmdb/test_ai_key.php.md) | L27 |  |
| [api/domains/settings.php](/code/files/api/domains/settings.php.md) | L36 |  |
| [api/forms/get_settings.php](/code/files/api/forms/get_settings.php.md) | L20 |  |
| [api/forms/test_ai_key.php](/code/files/api/forms/test_ai_key.php.md) | L47 |  |
| [api/knowledge/ai_chat.php](/code/files/api/knowledge/ai_chat.php.md) | L121 |  |
| [api/knowledge/generate_embedding.php](/code/files/api/knowledge/generate_embedding.php.md) | L35 |  |
| [api/knowledge/get_email_settings.php](/code/files/api/knowledge/get_email_settings.php.md) | L23, L54, L64, L74 |  |
| [api/knowledge/knowledge_archive.php](/code/files/api/knowledge/knowledge_archive.php.md) | getRetentionDays L126 |  |
| [api/knowledge/send_share_email.php](/code/files/api/knowledge/send_share_email.php.md) | L44 |  |
| [api/messaging/get_channels.php](/code/files/api/messaging/get_channels.php.md) | L50 |  |
| [api/myaccount/get_mfa_status.php](/code/files/api/myaccount/get_mfa_status.php.md) | L39 |  |
| [api/myaccount/verify_login_otp.php](/code/files/api/myaccount/verify_login_otp.php.md) | L178, L211 |  |
| [api/rfp-builder/get_ai_settings.php](/code/files/api/rfp-builder/get_ai_settings.php.md) | L31 |  |
| [api/rfp-builder/save_ai_settings.php](/code/files/api/rfp-builder/save_ai_settings.php.md) | L60 |  |
| [api/rfp-builder/test_ai_connection.php](/code/files/api/rfp-builder/test_ai_connection.php.md) | L42 |  |
| [api/settings/get_system_settings.php](/code/files/api/settings/get_system_settings.php.md) | L23 |  |
| [api/settings/save_system_settings.php](/code/files/api/settings/save_system_settings.php.md) | L81 |  |
| [api/system/db_verify.php](/code/files/api/system/db_verify.php.md) | L1665, L2035, L2667, L3633 |  |
| [api/system/debug-tools/D003_selfservice_sso.php](/code/files/api/system/debug-tools/D003_selfservice_sso.php.md) | L226, L227 |  |
| [api/system/debug-tools/D004_local_login.php](/code/files/api/system/debug-tools/D004_local_login.php.md) | L137 |  |
| [api/system/debug-tools/D010_signin_methods.php](/code/files/api/system/debug-tools/D010_signin_methods.php.md) | L246 |  |
| [api/system/get_branding.php](/code/files/api/system/get_branding.php.md) | L39, L95, L101 |  |
| [api/system/save_branding.php](/code/files/api/system/save_branding.php.md) | L181, L243 |  |
| [api/system/self_service_portal.php](/code/files/api/system/self_service_portal.php.md) | L58 |  |
| [api/tasks/get_settings.php](/code/files/api/tasks/get_settings.php.md) | L21 |  |
| [api/tickets/ai_cleanup_reply.php](/code/files/api/tickets/ai_cleanup_reply.php.md) | L98 |  |
| [api/tickets/clear_rota_cells.php](/code/files/api/tickets/clear_rota_cells.php.md) | L52 |  |
| [api/tickets/get_csat_settings.php](/code/files/api/tickets/get_csat_settings.php.md) | L21 |  |
| [api/tickets/get_public_base_url.php](/code/files/api/tickets/get_public_base_url.php.md) | L42 |  |
| [api/tickets/get_reply_cleanup_settings.php](/code/files/api/tickets/get_reply_cleanup_settings.php.md) | L25 |  |
| [api/tickets/get_rota.php](/code/files/api/tickets/get_rota.php.md) | L33 |  |
| [api/tickets/get_sla_cron_runs.php](/code/files/api/tickets/get_sla_cron_runs.php.md) | L37 |  |
| [api/tickets/get_sla_settings.php](/code/files/api/tickets/get_sla_settings.php.md) | L35 |  |
| [api/tickets/paste_rota_cells.php](/code/files/api/tickets/paste_rota_cells.php.md) | L92 |  |
| [api/tickets/paste_rota_line.php](/code/files/api/tickets/paste_rota_line.php.md) | L68 |  |
| [api/tickets/paste_rota_week.php](/code/files/api/tickets/paste_rota_week.php.md) | L61 |  |
| [api/tickets/test_reply_cleanup_key.php](/code/files/api/tickets/test_reply_cleanup_key.php.md) | L24 |  |
| [api/v1/lib/auth.php](/code/files/api/v1/lib/auth.php.md) | apiRateLimit L121 |  |
| [api/v1/resources/knowledge.php](/code/files/api/v1/resources/knowledge.php.md) | apiKnowledgePurgeExpired L136 |  |
| [api/watchtower/get_dashboard_ext.php](/code/files/api/watchtower/get_dashboard_ext.php.md) | L77 |  |
| [api/watchtower/get_settings.php](/code/files/api/watchtower/get_settings.php.md) | L50 |  |
| [api/workflow/test_ai_key.php](/code/files/api/workflow/test_ai_key.php.md) | L44 |  |
| [asset-management/handover.php](/code/files/asset-management/handover.php.md) | L53 |  |
| [cron/attachment_extract.php](/code/files/cron/attachment_extract.php.md) | L42, L77 |  |
| [cron/calendar_sync_pull.php](/code/files/cron/calendar_sync_pull.php.md) | L44 |  |
| [cron/domains.php](/code/files/cron/domains.php.md) | L48 |  |
| [cron/integration_poll.php](/code/files/cron/integration_poll.php.md) | L51 |  |
| [cron/lms_reminders.php](/code/files/cron/lms_reminders.php.md) | L46 |  |
| [cron/sla_breach_check.php](/code/files/cron/sla_breach_check.php.md) | L88 |  |
| [cron/task_recurrence.php](/code/files/cron/task_recurrence.php.md) | L45 |  |
| [cron/webhook_deliveries.php](/code/files/cron/webhook_deliveries.php.md) | L33 |  |
| [cron/workflow_scheduled.php](/code/files/cron/workflow_scheduled.php.md) | L45 |  |
| [includes/ai_provider.php](/code/files/includes/ai_provider.php.md) | aiProviderListOpenRouterModels L744 |  |
| [includes/ai_settings.php](/code/files/includes/ai_settings.php.md) | aiSettingsLoad L151 |  |
| [includes/asset_warranty_calendar.php](/code/files/includes/asset_warranty_calendar.php.md) | awcGetSetting L264 |  |
| [includes/attachment_limits.php](/code/files/includes/attachment_limits.php.md) | attachmentSetting L48 |  |
| [includes/back_link.php](/code/files/includes/back_link.php.md) | backLinkSettings L28 |  |
| [includes/branding.php](/code/files/includes/branding.php.md) | brandingLogoUrl L79, brandingLoginDesign L284 |  |
| [includes/calendar_sync/calendar_sync.php](/code/files/includes/calendar_sync/calendar_sync.php.md) | scheduleFeedMode L359 |  |
| [includes/calendar_sync/pull.php](/code/files/includes/calendar_sync/pull.php.md) | calendarAcceptDeletes L53, calendarNotifyUrl L362 |  |
| [includes/csat.php](/code/files/includes/csat.php.md) | csatGetSetting L27 |  |
| [includes/domains/lookup.php](/code/files/includes/domains/lookup.php.md) | domainRdapBootstrap L86, domainWhoisServer L320 |  |
| [includes/domains/scheduler.php](/code/files/includes/domains/scheduler.php.md) | domainOpportunisticRun L142 |  |
| [includes/domains/settings.php](/code/files/includes/domains/settings.php.md) | domainSettings L144 |  |
| [includes/encryption.php](/code/files/includes/encryption.php.md) | settingsGetDecrypted L354 |  |
| [includes/feature_bingo.php](/code/files/includes/feature_bingo.php.md) | featureBingoRunCheck L165 |  |
| [includes/feature_bingo/cards/files.php](/code/files/includes/feature_bingo/cards/files.php.md) | L80 |  |
| [includes/feature_bingo/cards/network-mapper.php](/code/files/includes/feature_bingo/cards/network-mapper.php.md) | L98 |  |
| [includes/feature_bingo/cards/self-service.php](/code/files/includes/feature_bingo/cards/self-service.php.md) | L171 |  |
| [includes/feature_bingo/cards/system-core.php](/code/files/includes/feature_bingo/cards/system-core.php.md) | L198, L210, L222, L234, L703 |  |
| [includes/feature_bingo/cards/system-integrations.php](/code/files/includes/feature_bingo/cards/system-integrations.php.md) | L89, L213, L225, L237, L249, L359 |  |
| [includes/feature_bingo/cards/tasks.php](/code/files/includes/feature_bingo/cards/tasks.php.md) | L74, L86 |  |
| [includes/feature_bingo/cards/tickets-channels.php](/code/files/includes/feature_bingo/cards/tickets-channels.php.md) | L1017 |  |
| [includes/feature_bingo/cards/tickets-core.php](/code/files/includes/feature_bingo/cards/tickets-core.php.md) | L710 |  |
| [includes/feature_bingo/cards/workflow.php](/code/files/includes/feature_bingo/cards/workflow.php.md) | L84 |  |
| [includes/files/storage.php](/code/files/includes/files/storage.php.md) | filesSetting L28 |  |
| [includes/functions.php](/code/files/includes/functions.php.md) | getModulePermissionMode L99 |  |
| [includes/inbox_display.php](/code/files/includes/inbox_display.php.md) | inboxDisplayInstallDefault L133 |  |
| [includes/intune.php](/code/files/includes/intune.php.md) | intuneGetSettings L18, intuneGetAppBatchSize L587 |  |
| [includes/knowledge/gap_analysis.php](/code/files/includes/knowledge/gap_analysis.php.md) | knowledgeOpenAiKey L33 |  |
| [includes/knowledge/kb_ai.php](/code/files/includes/knowledge/kb_ai.php.md) | kbRetrieveArticles L117 |  |
| [includes/knowledge/visibility.php](/code/files/includes/knowledge/visibility.php.md) | knowledgeFolderPermissionModel L750 |  |
| [includes/knowledge/writeup_ai.php](/code/files/includes/knowledge/writeup_ai.php.md) | writeupSettings L123 |  |
| [includes/landing.php](/code/files/includes/landing.php.md) | landingInstallDefault L63 |  |
| [includes/lms/competency_tests.php](/code/files/includes/lms/competency_tests.php.md) | lmsCtSettings L65 |  |
| [includes/lms_reminders.php](/code/files/includes/lms_reminders.php.md) | lmsReminderSettings L78, lmsReminderLinkFor L326 |  |
| [includes/managers.php](/code/files/includes/managers.php.md) | managersSettings L77 |  |
| [includes/messaging/messaging.php](/code/files/includes/messaging/messaging.php.md) | messagingPublicBaseUrl L113 |  |
| [includes/mfa_throttle.php](/code/files/includes/mfa_throttle.php.md) | mfaThrottleSetting L72 |  |
| [includes/module-colors.php](/code/files/includes/module-colors.php.md) | getModuleColors L65 |  |
| [includes/portal_visibility.php](/code/files/includes/portal_visibility.php.md) | portalThirdPartyPolicy L77 |  |
| [includes/projects/alerts.php](/code/files/includes/projects/alerts.php.md) | projectAlertsOpportunistic L277 |  |
| [includes/projects/settings.php](/code/files/includes/projects/settings.php.md) | projectSettings L160 |  |
| [includes/public_url.php](/code/files/includes/public_url.php.md) | publicBaseUrlSetting L54 |  |
| [includes/rfp_ai.php](/code/files/includes/rfp_ai.php.md) | rfpAiResolveStyleGuide L47, rfpAiGetSettings L65 |  |
| [includes/search/extract_queue.php](/code/files/includes/search/extract_queue.php.md) | extractQueueSettingOn L46 |  |
| [includes/search/tika.php](/code/files/includes/search/tika.php.md) | tikaUrl L60, tikaTimeout L87 |  |
| [includes/self_service.php](/code/files/includes/self_service.php.md) | selfServiceRegistrationEnabled L13 |  |
| [includes/self_service_settings.php](/code/files/includes/self_service_settings.php.md) | selfServicePortalSettings L55 |  |
| [includes/service_status_portal.php](/code/files/includes/service_status_portal.php.md) | ssPortalSettings L49 |  |
| [includes/services/assets.php](/code/files/includes/services/assets.php.md) | AssetsService::getIgnoredServiceTags L1172 |  |
| [includes/services/checklists.php](/code/files/includes/services/checklists.php.md) | ChecklistsService::tasksEnabled L428 |  |
| [includes/services/forms.php](/code/files/includes/services/forms.php.md) | FormsService::closeEffect L546 |  |
| [includes/services/knowledge.php](/code/files/includes/services/knowledge.php.md) | KnowledgeService::updateEmbedding L453 |  |
| [includes/services/service_uptime.php](/code/files/includes/services/service_uptime.php.md) | ServiceUptime::defaultWindowDays L57, ServiceUptime::shownInPortal L73 |  |
| [includes/services/tasks.php](/code/files/includes/services/tasks.php.md) | TasksService::collaboratorCompletionEnabled L621, TasksService::timeScope L1397 |  |
| [includes/sla.php](/code/files/includes/sla.php.md) | sla_load_settings L333 |  |
| [includes/system_name.php](/code/files/includes/system_name.php.md) | systemName L25 |  |
| [includes/tenant_settings.php](/code/files/includes/tenant_settings.php.md) | tenantSetting L61 |  |
| [includes/ticket_ai.php](/code/files/includes/ticket_ai.php.md) | ticketAiSettings L71 |  |
| [includes/ticket_display.php](/code/files/includes/ticket_display.php.md) | ticketDisplaySettings L74 |  |
| [includes/ticket_merge.php](/code/files/includes/ticket_merge.php.md) | mergeSettings L99 |  |
| [includes/ticket_numbering.php](/code/files/includes/ticket_numbering.php.md) | TicketNumbering::settings L81 |  |
| [includes/ticket_reply.php](/code/files/includes/ticket_reply.php.md) | customerReplyReopensTickets L44 |  |
| [includes/ticket_sensitivity.php](/code/files/includes/ticket_sensitivity.php.md) | ticketAiConfidentialPolicy L178 |  |
| [includes/ticket_snooze.php](/code/files/includes/ticket_snooze.php.md) | snoozeWakeHour L102 |  |
| [includes/timezone.php](/code/files/includes/timezone.php.md) | DateFmt::init L213 |  |
| [includes/uploads.php](/code/files/includes/uploads.php.md) | attachmentRejectPolicy L889, attachmentAllowedTypes L920 |  |
| [includes/users.php](/code/files/includes/users.php.md) | portalProfileSettingRaw L259 |  |
| [includes/warroom.php](/code/files/includes/warroom.php.md) | warRoomRetentionDays L1135, warRoomSweepOrphanFiles L1218 |  |
| [includes/watchtower_queries.php](/code/files/includes/watchtower_queries.php.md) | getWatchtowerData L239, getWatchtowerData L528, getWatchtowerData L724, getWatchtowerData L750 |  |
| [includes/webhook_delivery.php](/code/files/includes/webhook_delivery.php.md) | webhookPayloadRetentionDays L123 |  |
| [self-service/login.php](/code/files/self-service/login.php.md) | L48 |  |
| [system/date-formats/index.php](/code/files/system/date-formats/index.php.md) | L42 |  |
| [system/preferences/index.php](/code/files/system/preferences/index.php.md) | L128 |  |

