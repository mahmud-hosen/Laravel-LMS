<?php

use App\Http\Livewire\Admin\Aboutmenu\GoverningBodyComponent as AboutmenuGoverningBodyComponent;
use App\Http\Livewire\Admin\Aboutmenu\MessageFromChairmanComponent as AboutmenuMessageFromChairmanComponent;
use App\Http\Livewire\Admin\Aboutmenu\OverviewComponent as AboutmenuOverviewComponent;
use App\Http\Livewire\Admin\Academic\ClassTeacherComponent;
use App\Http\Livewire\Admin\Academic\ResultComponent as AcademicResultComponent;
use App\Http\Livewire\Admin\Alumni\AlumniComponent as AlumniAlumniComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\Faculty\FacultyCollegeComponent;
use App\Http\Livewire\Admin\Faculty\FacultyHighSchoolComponent;
use App\Http\Livewire\Admin\Faculty\FacultyPrePrimaryComponent;
use App\Http\Livewire\Admin\Faculty\FacultyPrimaryComponent;
use App\Http\Livewire\Admin\Homepage\AchievementsComponent;
use App\Http\Livewire\Admin\Homepage\BannerSectionComponent;
use App\Http\Livewire\Admin\Homepage\EventsComponent;
use App\Http\Livewire\Admin\Homepage\FacilitiesComponent;
use App\Http\Livewire\Admin\Homepage\MembersComponent;
use App\Http\Livewire\Admin\Notice\NoticeBoardComponent as NoticeNoticeBoardComponent;
use App\Http\Livewire\Admin\Oncampus\GalleryImagesComponent;
use App\Http\Livewire\Admin\Oncampus\ImageGalleryComponent;
use App\Http\Livewire\Admin\Publication\Article\AddPublicationArticleComponent;
use App\Http\Livewire\Admin\Publication\Article\EditPublicationArticleComponent;
use App\Http\Livewire\Admin\Publication\Article\PublicationArticleComponent;
use App\Http\Livewire\Admin\Publication\ArticleComponent;
use App\Http\Livewire\Admin\Publication\MagazineComponent;
use App\Http\Livewire\Admin\Websitesetup\FooterComponent;
use App\Http\Livewire\Admin\Websitesetup\HeaderComponent;
use App\Http\Livewire\Auth\LoginComponent;
use App\Http\Livewire\Frontend\About\FromThePrincipalDeskComponent;
use App\Http\Livewire\Frontend\About\GoverningBodyComponent;
use App\Http\Livewire\Frontend\About\MessageFromChairmanComponent;
use App\Http\Livewire\Frontend\About\MessageFromChairpatronComponent;
use App\Http\Livewire\Frontend\About\OverviewComponent;
use App\Http\Livewire\Frontend\Academic\ClassTeachersComponent;
use App\Http\Livewire\Frontend\Academic\CoordinatorComponent;
use App\Http\Livewire\Frontend\Academic\PrePrimariSchoolComponent;
use App\Http\Livewire\Frontend\Academic\ResultComponent;
use App\Http\Livewire\Frontend\Admission\AdmissionComponent;
use App\Http\Livewire\Frontend\Alumni\AlumniComponent;
use App\Http\Livewire\Frontend\Faculty\FacultyCollegeComponent as FacultyFacultyCollegeComponent;
use App\Http\Livewire\Frontend\Faculty\FacultyHighSchoolComponent as FacultyFacultyHighSchoolComponent;
use App\Http\Livewire\Frontend\Faculty\FacultyPrePrimaryComponent as FacultyFacultyPrePrimaryComponent;
use App\Http\Livewire\Frontend\Faculty\FacultyPrimaryComponent as FacultyFacultyPrimaryComponent;
use App\Http\Livewire\Frontend\HomeComponent;
use App\Http\Livewire\Frontend\Noticeboard\NoticeBoardComponent;
use App\Http\Livewire\Frontend\Oncampus\GalleryImagesComponent as OncampusGalleryImagesComponent;
use App\Http\Livewire\Frontend\Oncampus\OnCampusComponent;
use App\Http\Livewire\Frontend\Onlineclassroom\ClassRoutineComponent;
use App\Http\Livewire\Frontend\Onlineclassroom\OverviewComponent as OnlineclassroomOverviewComponent;
use App\Http\Livewire\Frontend\Onlineclassroom\RecordClassComponent;
use App\Http\Livewire\Frontend\Onlineclassroom\VacationHomeworkComponent;
use App\Http\Livewire\Frontend\Publication\PublicationComponent;
use App\Http\Livewire\Frontend\Publication\ReadArticleComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    abort(404);
});

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/about/overview', OverviewComponent::class)->name('home.aboutOverview');
Route::get('/about/governing-body', GoverningBodyComponent::class)->name('home.aboutGoverningBody');
Route::get('/about/message-from-the-chairman', MessageFromChairmanComponent::class)->name('home.aboutMessageFromChairman');
Route::get('/about/message-from-the-chair-patron', MessageFromChairpatronComponent::class)->name('home.aboutMessageFromChairPatron');
Route::get('/about/message-from-the-chair-patron', MessageFromChairpatronComponent::class)->name('home.aboutMessageFromChairPatron');
Route::get('/about/from-the-principles-desk', FromThePrincipalDeskComponent::class)->name('home.aboutFromPrinciplesDesk');


Route::get('/admission', AdmissionComponent::class)->name('home.admission');

Route::get('/academic/pre-primary-aschool', PrePrimariSchoolComponent::class)->name('home.academicPrePrimarySchool');
Route::get('/academic/coordinator', CoordinatorComponent::class)->name('home.academicCoordinator');
Route::get('/academic/class-teachers', ClassTeachersComponent::class)->name('home.academicClassTeachers');
Route::get('/academic/result', ResultComponent::class)->name('home.academicResult');
Route::get('/academic/from-the-principles-desk', FromThePrincipalDeskComponent::class)->name('home.academicFromPrinciplesDesk');

//Faculty
Route::get('/faculty/pre-primary', FacultyFacultyPrePrimaryComponent::class)->name('facultyPrePrimary');
Route::get('/faculty/primary', FacultyFacultyPrimaryComponent::class)->name('facultyPrimary');
Route::get('/faculty/high-school', FacultyFacultyHighSchoolComponent::class)->name('facultyHighSchool');
Route::get('/faculty/college', FacultyFacultyCollegeComponent::class)->name('facultyCollege');

Route::get('/online-classroom/overview', OnlineclassroomOverviewComponent::class)->name('onlineClassroom.overview');
Route::get('/online-classroom/routine', ClassRoutineComponent::class)->name('onlineClassroom.routine');
Route::get('/online-classroom/recorded-classes', RecordClassComponent::class)->name('onlineClassroom.records');
Route::get('/online-classroom/vacation-homework', VacationHomeworkComponent::class)->name('onlineClassroom.vacationHomework');


Route::get('/publication', PublicationComponent::class)->name('publication');
Route::get('/publication/read-article/{slug}', ReadArticleComponent::class)->name('publicationReadArticle');
Route::get('/notice-board', NoticeBoardComponent::class)->name('noticeBoard');
Route::get('/campus', OnCampusComponent::class)->name('onCampus');
Route::get('/campus/images/{slug}', OncampusGalleryImagesComponent::class)->name('onCampusImages');
Route::get('/alumni', AlumniComponent::class)->name('alumni');


Route::get('/admin/authentication', LoginComponent::class)->middleware('guest')->name('adminLogin');

Route::middleware(['auth:sanctum', 'verified'])->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

    //Home Page
    Route::get('/dashboard/homepage/top-section', BannerSectionComponent::class)->name('homeTopSection');
    Route::get('/dashboard/homepage/events', EventsComponent::class)->name('homeEvents');
    Route::get('/dashboard/homepage/members', MembersComponent::class)->name('homeMembers');
    Route::get('/dashboard/homepage/facilities', FacilitiesComponent::class)->name('homeFacilities');
    Route::get('/dashboard/homepage/achievements', AchievementsComponent::class)->name('homeAchievements');


    //About Menu
    Route::get('/dashboard/about-menu/overview', AboutmenuOverviewComponent::class)->name('aboutMenuOverview');
    Route::get('/dashboard/about-menu/governing-body', AboutmenuGoverningBodyComponent::class)->name('aboutMenuGoverningBody');
    Route::get('/dashboard/about-menu/message-from-chairman', AboutmenuMessageFromChairmanComponent::class)->name('aboutMessageFromChairman');

    //Academic Menu
    Route::get('/dashboard/academic/class-teachers', ClassTeacherComponent::class)->name('academicClassTeachers');
    Route::get('/dashboard/academic/result', AcademicResultComponent::class)->name('academicResult');

    //Faculty
    Route::get('/dashboard/faculty/pre-primary', FacultyPrePrimaryComponent::class)->name('facultyPrePrimary');
    Route::get('/dashboard/faculty/primary', FacultyPrimaryComponent::class)->name('facultyPrimary');
    Route::get('/dashboard/faculty/high-school', FacultyHighSchoolComponent::class)->name('facultyHighSchool');
    Route::get('/dashboard/faculty/college', FacultyCollegeComponent::class)->name('facultyCollege');

    //Alumni
    Route::get('/dashboard/alumni', AlumniAlumniComponent::class)->name('alumni');

    //Notice
    Route::get('/dashboard/notices', NoticeNoticeBoardComponent::class)->name('notice');

    //On Campus
    Route::get('/dashboard/on-campus', ImageGalleryComponent::class)->name('imageGallery');
    Route::get('/dashboard/on-campus/images/{id}', GalleryImagesComponent::class)->name('galleryImages');

    //Publication
    Route::get('/dashboard/publications/magazines', MagazineComponent::class)->name('magazines');
    Route::get('/dashboard/publications/articles', PublicationArticleComponent::class)->name('articles');
    Route::get('/dashboard/publications/articles/add-new-article', AddPublicationArticleComponent::class)->name('addArticle');
    Route::get('/dashboard/publications/articles/edit-article/{id}', EditPublicationArticleComponent::class)->name('editArticle');


    //Website Setup
    Route::get('/dashboard/website-setup/header', HeaderComponent::class)->name('websiteHeaderSetup');
    Route::get('/dashboard/website-setup/footer', FooterComponent::class)->name('websiteFooterSetup');
});
