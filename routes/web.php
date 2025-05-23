<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BUController;
use App\Http\Controllers\SecteurActiviteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ClientFournisseurController;

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CorpsMetierController;
use App\Http\Controllers\ConfigGlobalController;

use App\Http\Controllers\ContratController;
use App\Http\Controllers\StockProjetController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TransfertsStockController;
// Routes web.php
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\RegimeImpositionController;
use App\Http\Controllers\UniteMesureController;
use App\Http\Controllers\TypeTravauxController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\MonnaieController;
use App\Http\Controllers\ModeDePaiementController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\BpuController;
use App\Http\Controllers\CategorieBpuController;
use App\Http\Controllers\SousCategorieBpuController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\ImportController;

Route::get('/import_index', [ImportController::class, 'index'])->name('import.index');
Route::post('/import', [ImportController::class, 'import'])->name('import.create');

Route::resource('categoriesbpu', CategorieBpuController::class);
Route::resource('souscategoriesbpu', SousCategorieBpuController::class);
Route::post('/rubriques', [RubriqueController::class, 'store'])->name('rubriques.store');
Route::put('/rubriques/{id}', [RubriqueController::class, 'update'])->name('rubriques.update');
Route::delete('/rubriques/{id}', [RubriqueController::class, 'destroy'])->name('rubriques.destroy');


Route::resource('bpus', BpuController::class);

Route::get('/bup-contrat', [BpuController::class, 'index_contrat'])->name('bpu.contrat');
Route::get('/bup-print', [BpuController::class, 'print'])->name('bpu.print');
Route::get('/bupn-general', [BpuController::class, 'index'])->name('bpu.index');

Route::resource('prestations', PrestationController::class);
Route::resource('factures', FactureController::class);

Route::resource('documents', DocumentController::class)->except(['edit', 'update']);
Route::get('/documents_contrat', [DocumentController::class, 'index_contrat'])->name('document_contrat.index');

Route::resource('references', ReferenceController::class);
Route::resource('banques', BanqueController::class);

// Routes pour les Monnaies
Route::resource('monnaies', MonnaieController::class);

// Routes pour les Modes de Paiement
Route::resource('modes_de_paiement', ModeDePaiementController::class);

Route::get('/pays', [PaysController::class, 'index'])->name('pays.index');
Route::get('/pays/create', [PaysController::class, 'create'])->name('pays.create');
Route::post('/pays', [PaysController::class, 'store'])->name('pays.store');
Route::get('/pays/{id}/edit', [PaysController::class, 'edit'])->name('pays.edit');
Route::put('/pays/{id}', [PaysController::class, 'update'])->name('pays.update');
Route::delete('/pays/{id}', [PaysController::class, 'destroy'])->name('pays.destroy');

Route::get('/villes', [VilleController::class, 'index'])->name('villes.index');
Route::get('/villes/create', [VilleController::class, 'create'])->name('villes.create');
Route::post('/villes', [VilleController::class, 'store'])->name('villes.store');
Route::get('/villes/{id}/edit', [VilleController::class, 'edit'])->name('villes.edit');
Route::put('/villes/{id}', [VilleController::class, 'update'])->name('villes.update');
Route::delete('/villes/{id}', [VilleController::class, 'destroy'])->name('villes.destroy');

Route::get('/secteurs', [SecteurController::class, 'index'])->name('secteurs.index');
Route::get('/secteurs/create', [SecteurController::class, 'create'])->name('secteurs.create');
Route::post('/secteurs', [SecteurController::class, 'store'])->name('secteurs.store');
Route::get('/secteurs/{id}/edit', [SecteurController::class, 'edit'])->name('secteurs.edit');
Route::put('/secteurs/{id}', [SecteurController::class, 'update'])->name('secteurs.update');
Route::delete('/secteurs/{id}', [SecteurController::class, 'destroy'])->name('secteurs.destroy');

Route::get('/regime-impositions', [RegimeImpositionController::class, 'index'])->name('regime-impositions.index');
Route::get('/regime-impositions/create', [RegimeImpositionController::class, 'create'])->name('regime-impositions.create');
Route::post('/regime-impositions', [RegimeImpositionController::class, 'store'])->name('regime-impositions.store');
Route::get('/regime-impositions/{id}/edit', [RegimeImpositionController::class, 'edit'])->name('regime-impositions.edit');
Route::put('/regime-impositions/{id}', [RegimeImpositionController::class, 'update'])->name('regime-impositions.update');
Route::delete('/regime-impositions/{id}', [RegimeImpositionController::class, 'destroy'])->name('regime-impositions.destroy');

Route::get('/unite-mesures', [UniteMesureController::class, 'index'])->name('unite-mesures.index');
Route::get('/unite-mesures/create', [UniteMesureController::class, 'create'])->name('unite-mesures.create');
Route::post('/unite-mesures', [UniteMesureController::class, 'store'])->name('unite-mesures.store');
Route::get('/unite-mesures/{id}/edit', [UniteMesureController::class, 'edit'])->name('unite-mesures.edit');
Route::put('/unite-mesures/{id}', [UniteMesureController::class, 'update'])->name('unite-mesures.update');
Route::delete('/unite-mesures/{id}', [UniteMesureController::class, 'destroy'])->name('unite-mesures.destroy');

Route::get('/type-travaux', [TypeTravauxController::class, 'index'])->name('type-travaux.index');
Route::get('/type-travaux/create', [TypeTravauxController::class, 'create'])->name('type-travaux.create');
Route::post('/type-travaux', [TypeTravauxController::class, 'store'])->name('type-travaux.store');
Route::get('/type-travaux/{id}/edit', [TypeTravauxController::class, 'edit'])->name('type-travaux.edit');
Route::put('/type-travaux/{id}', [TypeTravauxController::class, 'update'])->name('type-travaux.update');
Route::delete('/type-travaux/{id}', [TypeTravauxController::class, 'destroy'])->name('type-travaux.destroy');

Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');

Route::patch('/ventes/{vente}/status', [VenteController::class, 'updateStatus'])->name('ventes.updateStatus');
Route::get('/ventes/report', [VenteController::class, 'showReportForm'])->name('ventes.report.form');
Route::post('/ventes/report', [VenteController::class, 'generateReport'])->name('ventes.report.generate');
// Dans routes/web.php
Route::get('/ventes/report/pdf', [VenteController::class, 'generatePDF'])->name('ventes.report.pdf');

Route::get('/ventes', [VenteController::class, 'index'])->name('ventes.index'); // Liste des ventes
Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create'); // Formulaire de création
Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store'); // Enregistrer une vente
Route::get('/ventes/{vente}', [VenteController::class, 'show'])->name('ventes.show'); // Voir une vente
Route::delete('/ventes/{vente}', [VenteController::class, 'destroy'])->name('ventes.destroy'); // Supprimer une vente

Route::prefix('caisse/')->group(function () {
    Route::get('brouillard', [CaisseController::class, 'showBrouillardCaisse'])->name('caisse.brouillard');
    Route::post('saisir-depense', [CaisseController::class, 'saisirDepense'])->name('caisse.saisirDepense');
    Route::post('approvisionner', [CaisseController::class, 'approvisionnerCaisse'])->name('caisse.approvisionnerCaisse');
    Route::post('demander-depense', [CaisseController::class, 'demandeDepense'])->name('caisse.demandeDepense');
    Route::post('valider-demande/{demandeId}', [CaisseController::class, 'validerDemandeDepense'])->name('caisse.validerDemandeDepense');
    Route::post('annuler-demande/{demandeId}', [CaisseController::class, 'annulerDemandeDepense'])->name('caisse.annulerDemandeDepense');
});
Route::get('/demande-depense', [CaisseController::class, 'listerDemandesDepenses'])->name('caisse.demande-liste');

Route::get('transferts', [TransfertsStockController::class, 'index'])->name('transferts.index');
Route::post('transferts', [TransfertsStockController::class, 'store'])->name('transferts.store');

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::prefix('stock')->group(function() {
    Route::get('/', [StockProjetController::class, 'index'])->name('stock.index');
    Route::get('/create', [StockProjetController::class, 'create'])->name('stock.create');
    Route::post('/', [StockProjetController::class, 'store'])->name('stock.store');
    Route::get('/{id}/edit', [StockProjetController::class, 'edit'])->name('stock.edit');
    Route::put('/{id}', [StockProjetController::class, 'update'])->name('stock.update');
    Route::delete('/{id}', [StockProjetController::class, 'destroy'])->name('stock.destroy');
});
Route::prefix('stock_contrat')->group(function() {
    Route::get('/', [StockProjetController::class, 'index_contrat'])->name('stock_contrat.index');
    Route::get('/create', [StockProjetController::class, 'create_contrat'])->name('stock_contrat.create');
    Route::post('/', [StockProjetController::class, 'store_contrat'])->name('stock_contrat.store');
    Route::get('/{id}/edit', [StockProjetController::class, 'edit_contrat'])->name('stock_contrat.edit');
    Route::put('/{id}', [StockProjetController::class, 'update_contrat'])->name('stock_contrat.update');
    Route::delete('/{id}', [StockProjetController::class, 'destroy_contrat'])->name('stock_contrat.destroy');
});

Route::prefix('contrats')->group(function() {
    Route::get('/', [ContratController::class, 'index'])->name('contrats.index');
    Route::get('create', [ContratController::class, 'create'])->name('contrats.create');
    Route::post('store', [ContratController::class, 'store'])->name('contrats.store');
    Route::get('edit/{id}', [ContratController::class, 'edit'])->name('contrats.edit');
    Route::put('update/{id}', [ContratController::class, 'update'])->name('contrats.update');
    Route::delete('destroy/{id}', [ContratController::class, 'destroy'])->name('contrats.destroy');
});
Route::get('/contrats/{id}', [ContratController::class, 'show'])->name('contrats.show');

Route::get('/config-global', [ConfigGlobalController::class, 'index'])->name('config-global.index');
Route::get('/config-global/create', [ConfigGlobalController::class, 'create'])->name('config-global.create');
Route::post('/config-global', [ConfigGlobalController::class, 'store'])->name('config-global.store');
Route::get('/config-global/{configGlobal}/edit', [ConfigGlobalController::class, 'edit'])->name('config-global.edit');
Route::put('/config-global/{configGlobal}', [ConfigGlobalController::class, 'update'])->name('config-global.update');
Route::delete('/config-global/{configGlobal}', [ConfigGlobalController::class, 'destroy'])->name('config-global.destroy');

Route::get('/corpsmetiers', [CorpsMetierController::class, 'index'])->name('corpsmetiers.index');
Route::get('/corpsmetiers/create', [CorpsMetierController::class, 'create'])->name('corpsmetiers.create');
Route::post('/corpsmetiers', [CorpsMetierController::class, 'store'])->name('corpsmetiers.store');
Route::get('/corpsmetiers/{id}/edit', [CorpsMetierController::class, 'edit'])->name('corpsmetiers.edit');
Route::put('/corpsmetiers/{id}', [CorpsMetierController::class, 'update'])->name('corpsmetiers.update');
Route::delete('/corpsmetiers/{id}', [CorpsMetierController::class, 'destroy'])->name('corpsmetiers.destroy');

Route::get('/artisans', [ArtisanController::class, 'index'])->name('artisans.index'); // 🏠 Voir tous les artisans
Route::get('/artisans/create', [ArtisanController::class, 'create'])->name('artisans.create'); // ➕ Formulaire d'ajout
Route::post('/artisans', [ArtisanController::class, 'store'])->name('artisans.store'); // ✅ Ajouter un artisan
Route::get('/artisans/{id}/edit', [ArtisanController::class, 'edit'])->name('artisans.edit'); // ✏️ Modifier un artisan
Route::put('/artisans/{id}', [ArtisanController::class, 'update'])->name('artisans.update'); // 🔄 Sauvegarder modification
Route::delete('/artisans/{id}', [ArtisanController::class, 'destroy'])->name('artisans.destroy'); // ❌ Supprimer

Route::get('fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index');
Route::get('fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create');
Route::post('fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');
Route::get('fournisseurs/{id}', [FournisseurController::class, 'show'])->name('fournisseurs.show');
Route::get('fournisseurs/{fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
Route::put('fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');
Route::delete('fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');

Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// Afficher la liste des projets
Route::get('/projets', [ProjetController::class, 'index'])->name('projets.index');
// Afficher le formulaire de création
Route::get('/projets/create', [ProjetController::class, 'create'])->name('projets.create');
// Enregistrer un nouveau projet
Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
// Afficher un projet spécifique
Route::get('/projets/{projet}', [ProjetController::class, 'show'])->name('projets.show');
// Afficher le formulaire de modification
Route::get('/projets/{projet}/edit', [ProjetController::class, 'edit'])->name('projets.edit');
// Mettre à jour un projet
Route::put('/projets/{projet}', [ProjetController::class, 'update'])->name('projets.update');
// Supprimer un projet
Route::delete('/projets/{projet}', [ProjetController::class, 'destroy'])->name('projets.destroy');

Route::get('sous_categories', [SousCategorieController::class, 'index'])->name('sous_categories.index'); // Liste des sous-catégories
Route::get('sous_categories/create', [SousCategorieController::class, 'create'])->name('sous_categories.create'); // Formulaire de création
Route::post('sous_categories', [SousCategorieController::class, 'store'])->name('sous_categories.store'); // Sauvegarder une sous-catégorie
Route::delete('sous_categories/{sousCategorie}', [SousCategorieController::class, 'destroy'])->name('sous_categories.destroy'); // Supprimer une sous-catégorie

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index'); // Liste des catégories
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Formulaire de création
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store'); // Sauvegarder une catégorie
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy'); // Supprimer une catégorie

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('secteur_activites', [SecteurActiviteController::class, 'index'])->name('secteur_activites.index'); // Lister les secteurs
Route::get('secteur_activites/create', [SecteurActiviteController::class, 'create'])->name('secteur_activites.create'); // Afficher le formulaire de création
Route::post('secteur_activites', [SecteurActiviteController::class, 'store'])->name('secteur_activites.store'); // Enregistrer un secteur
Route::get('secteur_activites/{secteur}/edit', [SecteurActiviteController::class, 'edit'])->name('secteur_activites.edit'); // Afficher le formulaire d'édition
Route::put('secteur_activites/{secteur}', [SecteurActiviteController::class, 'update'])->name('secteur_activites.update'); // Mettre à jour un secteur
Route::delete('secteur_activites/{secteur}', [SecteurActiviteController::class, 'destroy'])->name('secteur_activites.destroy'); // Supprimer un secteur

Route::get('bu', [BUController::class, 'index'])->name('bu.index'); // Lister tous les BUs
Route::get('bu/create', [BUController::class, 'create'])->name('bu.create'); // Formulaire de création
Route::post('bu', [BUController::class, 'store'])->name('bu.store'); // Enregistrer un BU
Route::get('bu/{bu}/edit', [BUController::class, 'edit'])->name('bu.edit'); // Formulaire d'édition
Route::put('bu/{bu}', [BUController::class, 'update'])->name('bu.update'); // Mettre à jour un BU
Route::delete('bu/{bu}', [BUController::class, 'destroy'])->name('bu.destroy'); // Supprimer un BU

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/select-bu', [AuthController::class, 'showSelectBU'])->name('select.bu')->middleware('auth');
Route::post('/select-bu', [AuthController::class, 'selectBU'])->name('select.bu.post')->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');
Route::get('/utilaire', function () {
    return view('until.index');
})->name('until')->middleware('auth');

Route::get('/', function () {
    return view('auth.login');
});
