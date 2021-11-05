<?php

use App\Http\Controllers\AboneApi;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\GaleryCategoryController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WebsiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FixedPageController;
use App\Http\Controllers\Frontend\ExtraController;
use App\Http\Controllers\IhaController;
use App\Http\Controllers\MobilAppController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\config\Lfm;
use \App\Http\Controllers\Backend\AdController;
use \Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Frontend\AjaxController;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\CornerPostsController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\ThemeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {

    return view('main.home');
});
Route::get('/linkstorage', function () {
    Artisan::call('storage:link --relative');
});

Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::get('/kategori/TumKategoriler', [ExtraController::class, 'TumKategoriler'])->name('TumKategoriler');


Route::middleware('optimizeImages')->group(function () {
    // all images will be optimized automatically
    Route::post('upload-images', 'UploadController@index');
});




Route::get('/install', function () {
    Artisan::call('db:seed');
    return "Kurulum Tamamlandı";
});




// ADMİN Routes
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    //admin Logout


    Route::get('/DBTrans',[ExtraController::class,'DBTrans']);


//Cache Clean
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');




        return redirect()->back();

    })->name('cacheClean');



    // ADMİN Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::post('/create/category', [CategoryController::class, 'CreateCategory'])->name('create.category');
    Route::get('/category/edit/{category}', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/update/category/{category}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
    Route::post('/update/status/{category}', [CategoryController::class, 'ActiveCategory'])->name('update.ActiveCategory');
    Route::get('/delete/category/{category}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

// ADMİN subcategory  Routes

    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
    Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');
    Route::post('/create/subcategory', [SubCategoryController::class, 'CreateSubCategory'])->name('create.subcategory');
    Route::get('/subcategory/edit/{subcategory}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');
    Route::post('/update/subcategory/{subcategory}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');
    Route::post('/subcategories/active/{subcategory}', [SubCategoryController::class, 'ActiveSubCategory'])->name('active.subcategory');
    Route::get('/delete/subcategory/{subcategory}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

// DİSTRİCT ALL WEB ROUTE
    Route::get('/district', [DistrictController::class, 'index'])->name('district');
    Route::get('/add/district', [DistrictController::class, 'AddDistrict'])->name('add.district');
    Route::post('/create/district', [DistrictController::class, 'CreateDistrict'])->name('create.district');
    Route::get('/district/edit/{district}', [DistrictController::class, 'EditDistrict'])->name('edit.district');
    Route::post('/district/active/{district}', [DistrictController::class, 'ActiveDistrict'])->name('active.district');
    Route::post('/update/district/{district}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');
    Route::get('/delete/district/{district}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');

// SUBDSTRİCT ALL ROUTE
    Route::get('/subdistricts', [SubDistrictController::class, 'index'])->name('subdistrict');
    Route::get('/add/subdistrict', [SubDistrictController::class, 'AddSubDistrict'])->name('add.subdistrict');
    Route::post('/create/subdistrict', [SubDistrictController::class, 'CreateSubDistrict'])->name('create.subdistrict');
    Route::get('/subdistrict/edit/{subdistrict}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');
    Route::post('/update/subdistrict/{subdistrict}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');
    Route::post('/subdistrict/active/{id}', [SubDistrictController::class, 'ActiveSubDistrict'])->name('active.subdistrict');
    Route::get('/delete/subdistrict/{subdistrict}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');
//AUTHORS ALL ROUTES
    Route::get('/authors', [AuthorController::class, 'index'])->name('list.authors');
    Route::get('/add/authors', [AuthorController::class, 'AddAuthors'])->name('add.authors');
    Route::post('/create/authors', [AuthorController::class, 'CreateAuthors'])->name('create.authors');
    Route::get('/authors/edit/{authors}', [AuthorController::class, 'EditAuthors'])->name('edit.authors');
    Route::post('/update/authors/{authors}', [AuthorController::class, 'UpdateAuthors'])->name('update.authors');
    Route::get('/delete/authors/{authors}', [AuthorController::class, 'DeleteAuthors'])->name('delete.authors');
    Route::post('/authors/active/{id}', [AuthorController::class, 'ActiveAuthors'])->name('active.authors');

    //AUTHORS POSTS ALL ROUTES
    Route::get('/authors/posts', [CornerPostsController::class, 'index'])->name('list.authorsposts');
    Route::get('/add/authorsposts', [CornerPostsController::class, 'AddAuthorsPosts'])->name('add.authorsposts');
    Route::post('/create/authorsposts', [CornerPostsController::class, 'CreateAuthorsPosts'])->name('create.authorsposts');
    Route::get('/authorsposts/edit/{cornerposts}', [CornerPostsController::class, 'EditAuthorsPosts'])->name('edit.koseyazilari');
    Route::post('/update/authorsposts/{cornerposts}', [CornerPostsController::class, 'UpdateAuthorsPosts'])->name('update.authorsposts');
    Route::get('/delete/authorsposts/{cornerposts}', [CornerPostsController::class, 'DeleteAuthorsPosts'])->name('delete.authorsposts');
    Route::post('/authorsposts/active/{id}', [CornerPostsController::class, 'ActiveAuthors'])->name('active.authorsPost');


    //Theme Settings
    Route::get('/theme/index',[ThemeController::class,'index'])->name('theme.index');
    Route::post('/theme/update/{id}',[ThemeController::class,'update'])->name('theme.update');

//otomatik altkategori çekmek için route JQERY ROTASI
    Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);
    Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);
//    Route::get('/get/subdistrict/{district_id}', [ExtraController::class, 'GetSubDistrict']);

// POSTS ALL ROUTE
    Route::get('/add/post', [PostController::class, 'AddPost'])->name('add.post');
    Route::get('/all/post', [PostController::class, 'index'])->name('all.post');
    //  Route::get('/all/orderImagesPage/{id}', [PostController::class, 'orderImagesPage'])->name('all.orderImagesPage');
    //  Route::get('/all/orderImagesUploadPage/{id}', [PostController::class, 'orderImagesUploadPage'])->name('all.orderImagesUploadPage');
    //  Route::post('/all/OrderphotoUpload/{id}', [PostController::class, 'OrderphotoUpload'])->name('OrderphotoUpload');
    //  Route::post('/all/Orderphotodelete/{id}', [PostController::class, 'Orderphotodelete'])->name('Orderphotodelete');


    Route::post('/create/post', [PostController::class, 'CreatePosts'])->name('create.post');
    Route::get('/post/edit/{post}', [PostController::class, 'EditPosts'])->name('edit.post');
    Route::post('/post/update/{post}', [PostController::class, 'UpdatePost'])->name('update.post');
    Route::post('/post/active/{id}', [PostController::class, 'ActivePost'])->name('active.post');
    Route::get('/post/delete/{post}', [PostController::class, 'DeletePost'])->name('delete.post');

    //İHA Settings
    Route::get('/iha/addpage/', [IhaController::class, 'ihanewsAdd'])->name('addpage.iha');
    Route::get('/iha/ihaxmlread', [IhaController::class, 'ihaxmlread'])->name('ihaxmlread.iha');
    Route::get('/iha/editPage/{id}', [IhaController::class, 'Editpage'])->name('editpage.iha');
    Route::post('/iha/add', [IhaController::class, 'iha'])->name('post.iha');
    Route::post('/iha/Userupdate', [IhaController::class, 'Userupdate'])->name('setting.userupdate');
    Route::get('/iha/Settingindex', [IhaController::class, 'Settingindex'])->name('setting.settingindex');
    Route::post('/iha/userAdd', [IhaController::class, 'UserAdd'])->name('settingiha.useradd');
    Route::post('/iha/ihaInsert', [IhaController::class, 'ihaInsert'])->name('addpage.ihaInsert');


    //Anadolu ajans
    Route::get('/anadoluajans/index', [\App\Http\Controllers\AnadoluAjansController::class, 'index'])->name('anadoluajans.index');
    Route::Post('/anadoluajans/add', [\App\Http\Controllers\AnadoluAjansController::class, 'add'])->name('anadoluajans.add');
    Route::Post('/anadoluajans/insert', [\App\Http\Controllers\AnadoluAjansController::class, 'insert'])->name('anadoluajans.insert');
    Route::get('/anadoluajans/Settingindex', [\App\Http\Controllers\AnadoluAjansController::class, 'Settingindex'])->name('anadoluajans.settingindex');
    Route::get('/anadoluajans/editPage/{id}', [\App\Http\Controllers\AnadoluAjansController::class, 'Editpage'])->name('editpage.anadoluajans');
    Route::post('/anadoluajans/Userupdate/', [\App\Http\Controllers\AnadoluAjansController::class, 'Userupdate'])->name('anadoluajans.userupdate');
    Route::post('/anadoluajans/userAdd', [\App\Http\Controllers\AnadoluAjansController::class, 'UserAdd'])->name('setting.useradd');



//Social Settings
    Route::get('/social/settings', [SettingController::class, 'SocialSetting'])->name('social.setting');
    Route::post('/social/update/{id}', [SettingController::class, 'UpdateSocial'])->name('social.update');
    Route::get('/seo/setting/', [SettingController::class, 'SeoSetting'])->name('seo.setting');
    Route::post('/seo/update/{id}', [SettingController::class, 'UpdateSeo'])->name('seos.update');

//Website Setting Settings
    Route::get('/webiste/settings', [WebsiteSettingController::class, 'index'])->name('website.setting');
    Route::post('/webiste/update/{websetting}', [WebsiteSettingController::class, 'Update'])->name('websetting.update');

//    Route::post('/social/update/{id}', [SettingController::class, 'UpdateSocial'])->name('social.update');
//    Route::get('/seo/setting/', [SettingController::class, 'SeoSetting'])->name('seo.setting');
//    Route::post('/seo/update/{id}', [SettingController::class, 'UpdateSeo'])->name('seos.update');
// GALERY CATEGORY
    Route::get('/galery/categories', [GaleryCategoryController::class, 'index'])->name('galeri.categories');
    Route::get('/add/galery/category', [GaleryCategoryController::class, 'AddCategory'])->name('add.galerycategory');
    Route::post('/create/galery/category', [GaleryCategoryController::class, 'CreateCategory'])->name('create.galerycategory');
    Route::get('/category/galery/edit/{photocategory}', [GaleryCategoryController::class, 'EditCategory'])->name('edit.galerycategory');
    Route::post('/update/galerycategory/{photocategory}', [GaleryCategoryController::class, 'UpdateCategory'])->name('update.galerycategory');
    Route::get('/delete/galerycategory/{photocategory}', [GaleryCategoryController::class, 'DeleteCategory'])->name('delete.galerycategory');
    Route::post('/galery/galerycategory/active/{id}', [GaleryCategoryController::class, 'ActiveGalery'])->name('active.galerycategory');


// PHOTO GALERY ROUTES
    Route::get('/photo/galery', [GalleryController::class, 'PhotoGalery'])->name('photo.galery');
    Route::get('/add/photogalery', [GalleryController::class, 'AddPhotoGalery'])->name('add.photogalery');
    Route::post('/create/photo', [GalleryController::class, 'CreatePhoto'])->name('create.photo');
    Route::get('/galery/detail/{id}', [GalleryController::class, 'GaleryDetail'])->name('galery.detail');
//    Route::get('/galery/update/', [GalleryController::class, 'UpdatePhoto'])->name('update.photo');
    Route::post('/add/photo/text/{photocategory_id}', [GalleryController::class, 'AddText'])->name('add.text');
    Route::post('/galery/photo/active/{id}', [GalleryController::class, 'ActivePhotoGalery'])->name('active.photogalery');
    Route::get('/galery/delete/{id}', [GalleryController::class, 'DeleteGalery'])->name('delete.galery');
    Route::get('/photo/galery/edit/{photocategory_id}', [GalleryController::class, 'EditPhotoGalery'])->name('edit.galery');
    Route::get('/galery/photo/delete/{id}', [GalleryController::class, 'DeletePhoto'])->name('delete.photo');

// Route::get('/subdistrict', [DistrictController::class, 'index'])->name('subdistrict');
    //ADS BACKEND
    Route::get('/list/ad', [AdController::class, 'ListAds'])->name('list.add');
    Route::get('/add/ads', [AdController::class, 'AddAds'])->name('add.ads');
    Route::post('/create/ads', [AdController::class, 'CreateAds'])->name('create.ads');
    Route::get('/edit/ad/{ads}', [AdController::class, 'EditAds'])->name('edit.ads');
    Route::post('/update/ad/{ad}', [AdController::class, 'UpdateAds'])->name('update.ads');
    Route::post('/update/ads/{ad}', [AdController::class, 'adsStatus'])->name('update.adsStatus');
    Route::get('/ad/delete/{ad}', [AdController::class, 'DeleteAds'])->name('delete.ads');

});


//FRONTEND ROUTES
//authors
Route::get('/yazar/{id}', [ExtraController::class, 'yazilar'])->name('authors.yazilar');
Route::get('/yazars/{id}', [ExtraController::class, 'yazilars'])->name('authors.yazilars');

//multi LANG ROUTES
Route::get('/lang/english', [ExtraController::class, 'English'])->name('lang.english');
Route::get('/lang/turkish', [ExtraController::class, 'Turkish'])->name('lang.turkish');
/// HAVA DURUMU AJAX ROUTE
Route::post('/ajax', [AjaxController::class, 'HavaDurumu'])->name('il.ajax');
Route::post('/ajax/home', [AjaxController::class, 'HavaDurumuHome'])->name('il.home');
Route::post('/ajax/stabilhome', [AjaxController::class, 'HavaDurumuStabil'])->name('il.stabilhome');

Route::get('/hava-durumu', [AjaxController::class, 'HavaDurum'])->name('hava.durum');
// NAMAZ VAKİTLERİ
Route::post('/ajax-namaz', [AjaxController::class, 'NamazVakit'])->name('il.namaz');
//Route::get('/ajax-namaz-seciliil', [AjaxController::class, 'NamazVakitSecili']);

Route::get('/yerel-haberler', [ExtraController::class, 'GetAllDistrict'])->name('yerelhaberler');
Route::post('/ajax-yerel-haber', [AjaxController::class, 'IlGetir'])->name('il.yerel');

//Fotogaleri ALL Routes
Route::get('/foto-galeri/{photogalery}', [ExtraController::class, 'PhotoGalleryDetail'])->name('photo.gallerydetail');

//Footer Fixed Pages
Route::get('/sayfa/{id}', [ExtraController::class, 'Sayfa'])->name('Open.fixedPage');


//RSS ROUTE
Route::get('/feed', [ExtraController::class, 'feed']);
Route::get('/', [ExtraController::class, 'Home']);
//SİTEMAP ROUTE
//SİTEMAP ROUTE
Route::get('/sitemap', [SitemapController::class, 'sitemap']);
Route::get('/sitemaps', [SitemapController::class, 'sitemapcategory'])->name('sitemapcategory');

//Route::get('/best-sitemap', [SitemapController::class, 'bestsitemap']);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:sanctum']], function () {
    \Mafftor\LaravelFileManager\Lfm::routes();
});

Route::get('/etiket/{tag}/{id}', [ExtraController::class, 'Etiket']);


//Fixed Page

Route::get('/fixedpage', [FixedPageController::class, 'index'])->name('fixedpage.index');
Route::get('/fixedpage/add', [FixedPageController::class, 'add'])->name('fixedpage.add');
Route::post('/fixedpage/post', [FixedPageController::class, 'store'])->name('fixedpage.postStore');
Route::post('/fixedpage/status/{id}', [FixedPageController::class, 'status'])->name('fixedpage.status');
Route::get('/fixedpage/delete/{id}', [FixedPageController::class, 'delete'])->name('fixedpage.delete');
Route::post('/fixedpage/edit/{id}', [FixedPageController::class, 'edit'])->name('fixedpage.edit');
Route::get('/fixedpage/editPage/{id}', [FixedPageController::class, 'editPage'])->name('fixedpage.editPage');


// User Operations

Route::get('/user/list', [UserController::class, 'index'])->name("user.index");
Route::get('/user/editPage/{id}', [UserController::class, 'editPage'])->name("user.editPage");
Route::post('/user/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
Route::get('/user/create', [UserController::class, 'create'])->name("user.create");
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name("user.delete");
Route::post('/user/insert', [UserController::class, 'insert'])->name("user.insert");


//Mobile App Json
Route::get('/json/manset', [MobilAppController::class, 'manset']);
Route::get('/json/mansetalti', [MobilAppController::class, 'mansetalti']);
Route::get('/json/world', [MobilAppController::class, 'world']);
Route::get('/json/ozelhaber', [MobilAppController::class, 'ozelhaber']);
Route::get('/json/tech', [MobilAppController::class, 'tech']);
Route::get('/json/artsandculture', [MobilAppController::class, 'artsandculture']);
Route::get('/json/sport', [MobilAppController::class, 'sport']);
Route::get('/json/health', [MobilAppController::class, 'health']);
Route::get('/json/economy', [MobilAppController::class, 'economy']);
Route::get('/json/education', [MobilAppController::class, 'education']);
Route::get('/json/politics', [MobilAppController::class, 'politics']);
Route::get('/json/agenda', [MobilAppController::class, 'agenda']);
Route::get('/json/threepage', [MobilAppController::class, 'threepage']);
Route::get('/json/comments/{id}', [MobilAppController::class, 'comments']);
Route::get('/json/commentsCount/{id}', [MobilAppController::class, 'commentsCount']);
Route::get('/json/photogallery/{id}', [MobilAppController::class, 'photogallery']);
Route::get('/json/photocategories/', [MobilAppController::class, 'photocategories']);
Route::get('/json/newsDetail/{id}', [MobilAppController::class, 'newsDetail']);
Route::get('/json/surmanset/', [MobilAppController::class, 'surmanset']);
Route::get('/json/authorspost/', [MobilAppController::class, 'authorspost']);
Route::get('/json/authors/', [MobilAppController::class, 'authors']);
Route::get('/json/authorspostDetail/{id}', [MobilAppController::class, 'authorspostDetail']);
Route::get('/json/story/', [MobilAppController::class, 'story']);
Route::get('/json/searchPost/{ad}', [MobilAppController::class, 'searchPost']);
Route::get('/json/commentposts/{id}/{ad}/{detay}', [MobilAppController::class, 'commentposts']);
Route::get('/json/categories/{id}', [MobilAppController::class, 'categories']);
Route::get('/json/fotogaleri/', [MobilAppController::class, 'fotogaleri']);
Route::get('/json/fotogaleriDetail/', [MobilAppController::class, 'fotogaleriDetail']);
Route::get('/json/AllPost/', [MobilAppController::class, 'AllPost']);
Route::get('/json/country/{id}', [MobilAppController::class, 'countrynews']);





//Search
Route::post('/search', [ExtraController::class, 'search'])->name('search');


//Comments
Route::get('/comments', [CommentsController::class, 'adminCommentsindex'])->name("comments.index");
Route::post('/comments/active/{id}', [CommentsController::class, 'ActiveComments'])->name('active.comments');
Route::get('/comments/delete/{id}', [CommentsController::class, 'DeleteComments'])->name('delete.comments');
Route::get('/comments/openPost/{postid}', [CommentsController::class, 'OpenComments'])->name('open.comments');
Route::post('/comments/post/{postid}', [CommentsController::class, 'AddComments'])->name('add.comments');





//Notification
Route::get('/Notification', [NotificationController::class, 'index'])->name("notification.index");
Route::post('/Notification/send', [NotificationController::class, 'send'])->name('notification.send');


// SİNGLE POST PAGE

Route::get('/{slug}/{id}/haberi', [ExtraController::class, 'SinglePost'])->name('singlePost'); // haber detay sayfası
Route::get('/{slug}/{id}', [ExtraController::class, 'CategoryPost']);
Route::get('/{id}/', [ExtraController::class, 'GetDistrict']);

//Route::get('/', [ExtraController::class, 'akbankkur']);




