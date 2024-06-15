<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualBanController;
use App\Http\Controllers\DefaultEmbedImageController;
use App\Http\Controllers\DiscordGuildController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LogsClientController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MapBanActionController;
use App\Http\Controllers\MapBanSessionController;
use App\Http\Controllers\MapBanTemplateController;
use App\Http\Controllers\MapBanTemplateMappoolController;
use App\Http\Controllers\MapBanTemplateProcedureController;
use App\Http\Controllers\MatchChannelController;
use App\Http\Controllers\MatchPerformanceController;
use App\Http\Controllers\MatchViewerRoleController;
use App\Http\Controllers\PlayerOperatorCountController;
use App\Http\Controllers\ProtestController;
use App\Http\Controllers\ProtestStatusController;
use App\Http\Controllers\ProtestTeamController;
use App\Http\Controllers\ProtestUpdateController;
use App\Http\Controllers\RegistrationKeyController;
use App\Http\Controllers\StatsDashboardController;
use App\Http\Controllers\StreamedMatchController;
use App\Http\Controllers\ToornamentTournamentInfoController;
use App\Http\Controllers\TournamentMinCorePlayerController;
use App\Http\Controllers\TournamentTeamController;


use App\Http\Controllers\API\JWTAuthController;



Route::group([
    'middleware' => ['jwt.auth'], // Ensure this is the correct middleware alias
    'prefix' => 'auth'
], function ($router) {
    // Protected routes
    Route::post('logout', [JWTAuthController::class, 'logout']);
    Route::post('refresh', [JWTAuthController::class, 'refresh']);
    Route::get('user-profile', [JWTAuthController::class, 'userProfile']);
});

// Public routes
Route::post('auth/login', [JWTAuthController::class, 'login']);
Route::post('auth/register', [JWTAuthController::class, 'register']);



Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/actual-bans', [ActualBanController::class, 'index']);
    Route::post('/actual-bans', [ActualBanController::class, 'store']);
});

Route::get('/actual-bans/{id}', [ActualBanController::class, 'show']);
Route::put('/actual-bans/{id}', [ActualBanController::class, 'update']);
Route::patch('/actual-bans/{id}', [ActualBanController::class, 'update']);
Route::delete('/actual-bans/{id}', [ActualBanController::class, 'destroy']);

Route::get('/default-embed-images', [DefaultEmbedImageController::class, 'index']);
Route::post('/default-embed-images', [DefaultEmbedImageController::class, 'store']);
Route::get('/default-embed-images/{id}', [DefaultEmbedImageController::class, 'show']);
Route::put('/default-embed-images/{id}', [DefaultEmbedImageController::class, 'update']);
Route::patch('/default-embed-images/{id}', [DefaultEmbedImageController::class, 'update']);
Route::delete('/default-embed-images/{id}', [DefaultEmbedImageController::class, 'destroy']);

Route::get('/discord-guilds', [DiscordGuildController::class, 'index']);
Route::post('/discord-guilds', [DiscordGuildController::class, 'store']);
Route::get('/discord-guilds/{id}', [DiscordGuildController::class, 'show']);
Route::put('/discord-guilds/{id}', [DiscordGuildController::class, 'update']);
Route::patch('/discord-guilds/{id}', [DiscordGuildController::class, 'update']);
Route::delete('/discord-guilds/{id}', [DiscordGuildController::class, 'destroy']);

Route::get('/games', [GameController::class, 'index']);
Route::post('/games', [GameController::class, 'store']);
Route::get('/games/{id}', [GameController::class, 'show']);
Route::put('/games/{id}', [GameController::class, 'update']);
Route::patch('/games/{id}', [GameController::class, 'update']);
Route::delete('/games/{id}', [GameController::class, 'destroy']);

Route::get('/logs', [LogsClientController::class, 'index']);
Route::post('/logs', [LogsClientController::class, 'store']);
Route::get('/logs/{id}', [LogsClientController::class, 'show']);
Route::put('/logs/{id}', [LogsClientController::class, 'update']);
Route::patch('/logs/{id}', [LogsClientController::class, 'update']);
Route::delete('/logs/{id}', [LogsClientController::class, 'destroy']);

Route::get('/maps', [MapController::class, 'index']);
Route::post('/maps', [MapController::class, 'store']);
Route::get('/maps/{id}', [MapController::class, 'show']);
Route::put('/maps/{id}', [MapController::class, 'update']);
Route::patch('/maps/{id}', [MapController::class, 'update']);
Route::delete('/maps/{id}', [MapController::class, 'destroy']);

Route::get('/map-ban-actions', [MapBanActionController::class, 'index']);
Route::post('/map-ban-actions', [MapBanActionController::class, 'store']);
Route::get('/map-ban-actions/{id}', [MapBanActionController::class, 'show']);
Route::put('/map-ban-actions/{id}', [MapBanActionController::class, 'update']);
Route::patch('/map-ban-actions/{id}', [MapBanActionController::class, 'update']);
Route::delete('/map-ban-actions/{id}', [MapBanActionController::class, 'destroy']);

Route::get('/map-ban-sessions', [MapBanSessionController::class, 'index']);
Route::post('/map-ban-sessions', [MapBanSessionController::class, 'store']);
Route::get('/map-ban-sessions/{id}', [MapBanSessionController::class, 'show']);
Route::put('/map-ban-sessions/{id}', [MapBanSessionController::class, 'update']);
Route::patch('/map-ban-sessions/{id}', [MapBanSessionController::class, 'update']);
Route::delete('/map-ban-sessions/{id}', [MapBanSessionController::class, 'destroy']);

Route::get('/map-ban-templates', [MapBanTemplateController::class, 'index']);
Route::post('/map-ban-templates', [MapBanTemplateController::class, 'store']);
Route::get('/map-ban-templates/{id}', [MapBanTemplateController::class, 'show']);
Route::put('/map-ban-templates/{id}', [MapBanTemplateController::class, 'update']);
Route::patch('/map-ban-templates/{id}', [MapBanTemplateController::class, 'update']);
Route::delete('/map-ban-templates/{id}', [MapBanTemplateController::class, 'destroy']);

Route::get('/map-ban-template-mappools', [MapBanTemplateMappoolController::class, 'index']);
Route::get('/map-ban-template-mappools/{id}', [MapBanTemplateMappoolController::class, 'show']);
Route::post('/map-ban-template-mappools', [MapBanTemplateMappoolController::class, 'store']);
Route::put('/map-ban-template-mappools/{id}', [MapBanTemplateMappoolController::class, 'update']);
Route::patch('/map-ban-template-mappools/{id}', [MapBanTemplateMappoolController::class, 'update']);
Route::delete('/map-ban-template-mappools/{id}', [MapBanTemplateMappoolController::class, 'destroy']);

Route::get('/map-ban-template-procedures', [MapBanTemplateProcedureController::class, 'index']);
Route::get('/map-ban-template-procedures/{id}', [MapBanTemplateProcedureController::class, 'show']);
Route::post('/map-ban-template-procedures', [MapBanTemplateProcedureController::class, 'store']);
Route::put('/map-ban-template-procedures/{id}', [MapBanTemplateProcedureController::class, 'update']);
Route::patch('/map-ban-template-procedures/{id}', [MapBanTemplateProcedureController::class, 'update']);
Route::delete('/map-ban-template-procedures/{id}', [MapBanTemplateProcedureController::class, 'destroy']);

Route::get('/match-channels', [MatchChannelController::class, 'index']);
Route::get('/match-channels/{id}', [MatchChannelController::class, 'show']);
Route::post('/match-channels', [MatchChannelController::class, 'store']);
Route::put('/match-channels/{id}', [MatchChannelController::class, 'update']);
Route::patch('/match-channels/{id}', [MatchChannelController::class, 'update']);
Route::delete('/match-channels/{id}', [MatchChannelController::class, 'destroy']);

Route::get('/match-performances', [MatchPerformanceController::class, 'index']);
Route::get('/match-performances/{id}', [MatchPerformanceController::class, 'show']);
Route::post('/match-performances', [MatchPerformanceController::class, 'store']);
Route::put('/match-performances/{id}', [MatchPerformanceController::class, 'update']);
Route::patch('/match-performances/{id}', [MatchPerformanceController::class, 'update']);
Route::delete('/match-performances/{id}', [MatchPerformanceController::class, 'destroy']);

Route::get('/match-viewer-roles', [MatchViewerRoleController::class, 'index']);
Route::get('/match-viewer-roles/{id}', [MatchViewerRoleController::class, 'show']);
Route::post('/match-viewer-roles', [MatchViewerRoleController::class, 'store']);
Route::put('/match-viewer-roles/{id}', [MatchViewerRoleController::class, 'update']);
Route::patch('/match-viewer-roles/{id}', [MatchViewerRoleController::class, 'update']);
Route::delete('/match-viewer-roles/{id}', [MatchViewerRoleController::class, 'destroy']);

Route::get('/player-operator-counts', [PlayerOperatorCountController::class, 'index']);
Route::get('/player-operator-counts/{id}', [PlayerOperatorCountController::class, 'show']);
Route::post('/player-operator-counts', [PlayerOperatorCountController::class, 'store']);
Route::put('/player-operator-counts/{id}', [PlayerOperatorCountController::class, 'update']);
Route::patch('/player-operator-counts/{id}', [PlayerOperatorCountController::class, 'update']);
Route::delete('/player-operator-counts/{id}', [PlayerOperatorCountController::class, 'destroy']);

Route::get('/protests', [ProtestController::class, 'index']);
Route::get('/protests/{id}', [ProtestController::class, 'show']);
Route::post('/protests', [ProtestController::class, 'store']);
Route::put('/protests/{id}', [ProtestController::class, 'update']);
Route::patch('/protests/{id}', [ProtestController::class, 'update']);
Route::delete('/protests/{id}', [ProtestController::class, 'destroy']);

Route::get('/protest-statuses', [ProtestStatusController::class, 'index']);
Route::post('/protest-statuses', [ProtestStatusController::class, 'store']);
Route::get('/protest-statuses/{id}', [ProtestStatusController::class, 'show']);
Route::put('/protest-statuses/{id}', [ProtestStatusController::class, 'update']);
Route::patch('/protest-statuses/{id}', [ProtestStatusController::class, 'update']);
Route::delete('/protest-statuses/{id}', [ProtestStatusController::class, 'destroy']);

Route::get('/protest-teams', [ProtestTeamController::class, 'index']);
Route::post('/protest-teams', [ProtestTeamController::class, 'store']);
Route::get('/protest-teams/{id}', [ProtestTeamController::class, 'show']);
Route::put('/protest-teams/{id}', [ProtestTeamController::class, 'update']);
Route::patch('/protest-teams/{id}', [ProtestTeamController::class, 'update']);
Route::delete('/protest-teams/{id}', [ProtestTeamController::class, 'destroy']);

Route::get('/protest-updates', [ProtestUpdateController::class, 'index']);
Route::post('/protest-updates', [ProtestUpdateController::class, 'store']);
Route::get('/protest-updates/{id}', [ProtestUpdateController::class, 'show']);
Route::put('/protest-updates/{id}', [ProtestUpdateController::class, 'update']);
Route::patch('/protest-updates/{id}', [ProtestUpdateController::class, 'update']);
Route::delete('/protest-updates/{id}', [ProtestUpdateController::class, 'destroy']);

Route::get('/registration-keys', [RegistrationKeyController::class, 'index']);
Route::post('/registration-keys', [RegistrationKeyController::class, 'store']);
Route::get('/registration-keys/{id}', [RegistrationKeyController::class, 'show']);
Route::put('/registration-keys/{id}', [RegistrationKeyController::class, 'update']);
Route::patch('/registration-keys/{id}', [RegistrationKeyController::class, 'update']);
Route::delete('/registration-keys/{id}', [RegistrationKeyController::class, 'destroy']);

Route::get('/stats-dashboard', [StatsDashboardController::class, 'index']);
Route::post('/stats-dashboard', [StatsDashboardController::class, 'store']);
Route::get('/stats-dashboard/{id}', [StatsDashboardController::class, 'show']);
Route::put('/stats-dashboard/{id}', [StatsDashboardController::class, 'update']);
Route::patch('/stats-dashboard/{id}', [StatsDashboardController::class, 'update']);
Route::delete('/stats-dashboard/{id}', [StatsDashboardController::class, 'destroy']);

Route::get('/streamed-matches', [StreamedMatchController::class, 'index']);
Route::post('/streamed-matches', [StreamedMatchController::class, 'store']);
Route::get('/streamed-matches/{id}', [StreamedMatchController::class, 'show']);
Route::put('/streamed-matches/{id}', [StreamedMatchController::class, 'update']);
Route::patch('/streamed-matches/{id}', [StreamedMatchController::class, 'update']);
Route::delete('/streamed-matches/{id}', [StreamedMatchController::class, 'destroy']);

Route::get('/toornament-tournament-info', [ToornamentTournamentInfoController::class, 'index']);
Route::post('/toornament-tournament-info', [ToornamentTournamentInfoController::class, 'store']);
Route::get('/toornament-tournament-info/{id}', [ToornamentTournamentInfoController::class, 'show']);
Route::put('/toornament-tournament-info/{id}', [ToornamentTournamentInfoController::class, 'update']);
Route::patch('/toornament-tournament-info/{id}', [ToornamentTournamentInfoController::class, 'update']);
Route::delete('/toornament-tournament-info/{id}', [ToornamentTournamentInfoController::class, 'destroy']);

// TournamentMinCorePlayerController
Route::get('/tournament-min-core-players', [TournamentMinCorePlayerController::class, 'index']);
Route::post('/tournament-min-core-players', [TournamentMinCorePlayerController::class, 'store']);
Route::get('/tournament-min-core-players/{id}', [TournamentMinCorePlayerController::class, 'show']);
Route::put('/tournament-min-core-players/{id}', [TournamentMinCorePlayerController::class, 'update']);
Route::patch('/tournament-min-core-players/{id}', [TournamentMinCorePlayerController::class, 'update']);
Route::delete('/tournament-min-core-players/{id}', [TournamentMinCorePlayerController::class, 'destroy']);

Route::get('/tournament-teams', [TournamentTeamController::class, 'index']);
Route::post('/tournament-teams', [TournamentTeamController::class, 'store']);
Route::get('/tournament-teams/{id}', [TournamentTeamController::class, 'show']);
Route::put('/tournament-teams/{id}', [TournamentTeamController::class, 'update']);
Route::patch('/tournament-teams/{id}', [TournamentTeamController::class, 'update']);
Route::delete('/tournament-teams/{id}', [TournamentTeamController::class, 'destroy']);