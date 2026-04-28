<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\EnrollmentStep;
use App\Models\Fee;
use App\Models\GalleryItem;
use App\Models\HeroSlide;
use App\Models\NewsPost;
use App\Models\Notice;
use App\Models\Page;
use App\Models\PortalLink;
use App\Models\Programme;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@makenicollege.org'],
            ['name' => 'MACE Administrator', 'role' => 'super_admin', 'password' => Hash::make('password')]
        );

        $this->seedSettings();
        $this->seedPages();
        $this->seedHeroSlides();
        $this->seedAcademics();
        $this->seedFeesAndEnrollment();
        $this->seedGallery();
        $this->seedNewsAndNotices();
        $this->seedPortals();
    }

    private function seedSettings(): void
    {
        $settings = [
            'site_logo' => ['images/college.png', 'site'],
            'home_hero_image' => ['images/Banners.jpg', 'site'],
            'site_name' => ['Makeni College of Education Zambia', 'site'],
            'contact_phone' => ['Call: +260 962 974 898', 'site'],
            'whatsapp_number' => ['260962974898', 'site'],
            'contact_email' => ['info@makenicollege.org', 'site'],
            'contact_email_2' => ['mist.zambia@yahoo.com', 'site'],
            'contact_address' => ['P.O. Box No. 32531, Mosque Road, Makeni., Lusaka, Zambia.', 'site'],
            'map_coordinate' => ['-15.45478182313543, 28.2560011', 'site'],
            'about_image' => ['images/AboutUS.png', 'site'],
            'contact_image' => ['images/CardImages1.png', 'site'],
            'footer_about' => ['Makeni College of Education Zambia prepares competent teachers through professional, values-driven education.', 'site'],
            'seo_title' => ['Makeni College of Education Zambia', 'seo'],
            'seo_meta_description' => ['Official CMS-powered website for Makeni College of Education Zambia.', 'seo'],
            'portal_staff_label' => ['Staff Portal', 'portals'],
            'portal_student_label' => ['Student Portal', 'portals'],
            'portal_lms_label' => ['Learning Management System', 'portals'],
            'portal_exam_label' => ['Online Exam Portal', 'portals'],
        ];

        foreach ($settings as $key => [$value, $group]) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => $group]);
        }
    }

    private function seedPages(): void
    {
        Page::updateOrCreate(['slug' => 'home'], [
            'title' => 'Home',
            'excerpt' => 'Makeni College of Education Zambia website home page.',
            'hero_title' => 'Teacher Education for Service and Excellence',
            'hero_subtitle' => 'Makeni College of Education Zambia provides a professional digital front door for academic programmes, departments, news, notices, gallery content, and future education portals.',
            'seo_title' => 'Makeni College of Education Zambia',
            'meta_description' => 'Makeni College of Education Zambia official college website.',
        ]);

        Page::updateOrCreate(['slug' => 'about-us'], [
            'title' => 'About Us',
            'excerpt' => 'A leading teacher training institution committed to producing qualified professionals for diploma-level programs in Primary and Secondary education.',
            'body' => "Makeni College of Education is a leading teacher training institution committed to producing qualified professionals for diploma-level programs in both Primary and Secondary education. The college is registered under the Ministry of Education and affiliated to the University of Zambia.\n\nIn addition to teacher education, our institution also houses a Vocational Training Department accredited by Technical Education Vocational And Entrepreneurship Training Authority (TEVETA). As one of Zambia's premier institutions, we are dedicated to shaping the educators and skilled professionals of tomorrow.\n\nThe department was established with a vision to become a center of academic excellence and moral integrity. It serves as a beacon of high-quality education and career-focused training. Our Vocational Training Department emphasizes hands-on learning and competency-based education designed to prepare students for immediate employment, entrepreneurship, or further studies in technical and vocational fields.\n\nAt Makeni College of Education, we believe in nurturing both academic knowledge and practical skills. Our integrated approach equips students not just for examinations, but for life and the workforce. We offer a range of academic and vocational programs to ensure that every student finds a path to success.\n\nMakeni College of Education, Zambia, is a dedicated teacher training institution committed to shaping competent, ethical, and future-ready educators. We focus on delivering high-quality academic programs that combine strong theoretical foundations with practical classroom experience.\n\nOur mission is to develop teachers who inspire learning, uphold professional discipline, and contribute meaningfully to their communities. Through a balanced approach to education, we equip our students with the knowledge, skills, and values needed to thrive in modern learning environments.\n\nAt Makeni College of Education, we believe that great teachers build strong nations. That is why we emphasize innovation in teaching, continuous professional development, and a deep commitment to service.\n\nOur Core Focus\nAcademic Excellence in Teacher Training\nPractical and Hands-on Learning\nProfessional Discipline and Ethics\nCommunity Engagement and Impact\n\nOur Vision\nTo be a leading teacher education institution in Zambia, recognized for producing transformative educators.\n\nOur Mission\nTo train and empower teachers with the skills, knowledge, and values needed to educate, inspire, and lead.",
            'seo_title' => 'About Makeni College of Education Zambia',
            'meta_description' => 'Learn about Makeni College of Education Zambia.',
        ]);
    }

    private function seedAcademics(): void
    {
        $education = Department::updateOrCreate(['slug' => 'teacher-education'], [
            'title' => 'Teacher Education',
            'description' => 'Coordinates diploma programmes for primary and secondary teacher preparation.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Department::updateOrCreate(['slug' => 'academic-affairs'], [
            'title' => 'Academic Affairs',
            'description' => 'Supports curriculum planning, assessment coordination, and academic quality control.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Department::updateOrCreate(['slug' => 'student-affairs'], [
            'title' => 'Student Affairs',
            'description' => 'Supports student welfare, communication, activities, and campus life.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Programme::updateOrCreate(['slug' => 'primary-teachers-diploma'], [
            'department_id' => $education->id,
            'title' => 'PRIMARY TEACHERS DIPLOMA',
            'level' => 'Teacher Training',
            'duration' => '3 years',
            'image' => 'images/teacher-classroom-banner.png',
            'description' => 'A professional diploma pathway for students preparing to teach at primary school level.',
            'requirements' => 'Entry requirements are managed by the college admissions office and can be updated in the CMS.',
            'is_active' => true,
        ]);

        Programme::updateOrCreate(['slug' => 'secondary-teachers-diploma'], [
            'department_id' => $education->id,
            'title' => "SECONDARY TEACHER'S DIPLOMA",
            'level' => 'Teacher Training',
            'duration' => '3 years',
            'image' => 'images/trainee-mentorship-banner.png',
            'description' => 'A professional diploma pathway for students preparing to teach at secondary school level.',
            'requirements' => 'Subject combinations and admission requirements can be maintained through the CMS.',
            'is_active' => true,
        ]);

        $vocational = Department::updateOrCreate(['slug' => 'vocational-training'], [
            'title' => 'Vocational Training',
            'description' => 'Practical skills training pathways prepared for college-managed short course delivery.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        foreach ([
            ['computer-applications', 'Computer Applications', 'Digital literacy, office productivity, and practical computer use for education and work.'],
            ['entrepreneurship-skills', 'Entrepreneurship Skills', 'Small business planning, communication, and practical enterprise development.'],
            ['early-childhood-support', 'Early Childhood Support', 'Practical support skills for early learning environments and child development.'],
            ['community-education', 'Community Education', 'Applied community learning, adult education support, and local development practice.'],
        ] as [$slug, $title, $description]) {
            Programme::updateOrCreate(['slug' => $slug], [
                'department_id' => $vocational->id,
                'title' => $title,
                'level' => 'Vocational Training',
                'duration' => '6 months',
                'image' => match ($slug) {
                    'community-education', 'early-childhood-support' => 'images/community-teaching-banner.png',
                    'computer-applications' => 'images/trainee-mentorship-banner.png',
                    default => 'images/teacher-classroom-banner.png',
                },
                'description' => $description,
                'requirements' => 'Contact admissions for current intake requirements.',
                'is_active' => true,
            ]);
        }
    }

    private function seedHeroSlides(): void
    {
        foreach ([
            ['Teacher Education Rooted in Service', 'Prepare for primary and secondary teaching through a college environment focused on discipline, professional practice, and community impact.', 'images/Banners.jpg'],
            ['Admissions Open for Diploma Programmes', 'Explore Primary Teachers Diploma and Secondary Teacher\'s Diploma pathways under Makeni College of Education.', 'images/Banners.jpg'],
            ['Skills for Zambia, Values for Life', 'Build practical knowledge, confidence, and professional habits for classrooms and community leadership.', 'images/Banners.jpg'],
        ] as $index => [$headline, $subtext, $image]) {
            HeroSlide::updateOrCreate(['headline' => $headline], [
                'subtext' => $subtext,
                'image' => $image,
                'cta_label' => 'Apply Now',
                'cta_url' => '/contact-us#enquiry-form',
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }

    private function seedFeesAndEnrollment(): void
    {
        foreach ([
            ['Application Fee', 'All applicants', 'Contact Admissions', 'Once-off', 'Payable when submitting an application.', true],
            ['Registration Fee', 'Accepted students', 'Contact Admissions', 'Per intake', 'Confirms admission after acceptance.', true],
            ['Tuition Fee', 'Teacher Training', 'Available from Admissions Office', 'Per term', 'Official tuition depends on programme and intake.', false],
            ['Vocational Course Fee', 'Vocational Training', 'Available from Admissions Office', 'Per course', 'Short course fees are confirmed before each intake.', false],
            ['Examination Fee', 'All programmes', 'As advised by College', 'As scheduled', 'Applies where external or internal examinations are scheduled.', false],
        ] as $index => [$title, $group, $amount, $frequency, $note, $highlight]) {
            Fee::updateOrCreate(['title' => $title], [
                'programme_group' => $group,
                'amount' => $amount,
                'frequency' => $frequency,
                'note' => $note,
                'sort_order' => $index + 1,
                'is_highlighted' => $highlight,
            ]);
        }

        foreach ([
            ['Choose Programme', 'Review the teacher training or vocational pathway that matches your goals.', '01'],
            ['Contact Admissions', 'Request current intake details, fees, and entry requirements from the college.', '02'],
            ['Submit Application', 'Provide the required application details and supporting documents.', '03'],
            ['Confirm Enrollment', 'Complete registration after acceptance and receive reporting guidance.', '04'],
        ] as $index => [$title, $description, $icon]) {
            EnrollmentStep::updateOrCreate(['title' => $title], [
                'description' => $description,
                'icon' => $icon,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }

    private function seedGallery(): void
    {
        foreach ([
            ['College Identity', 'Campus', 'Makeni College of Education Zambia official identity.', 'images/college.png'],
            ['Academic Excellence', 'Academics', 'Teacher education and professional development.', 'images/teacher-classroom-banner.png'],
            ['Student Life', 'College Life', 'A student-focused college environment.', 'images/trainee-mentorship-banner.png'],
            ['Admissions', 'Admissions', 'Admissions information and college communication.', 'images/Banners.jpg'],
            ['Programmes', 'Academics', 'Diploma programmes under the college.', 'images/teacher-classroom-banner.png'],
            ['Community', 'College Life', 'Service, values, and academic community.', 'images/community-teaching-banner.png'],
        ] as $index => [$title, $category, $caption, $image]) {
            GalleryItem::updateOrCreate(['title' => $title], [
                'category' => $category,
                'image' => $image,
                'caption' => $caption,
                'sort_order' => $index + 1,
                'is_featured' => $index < 3,
            ]);
        }
    }

    private function seedNewsAndNotices(): void
    {
        NewsPost::updateOrCreate(['slug' => 'new-cms-website-launched'], [
            'title' => 'Makeni College Website CMS Foundation Launched',
            'excerpt' => 'The college website now includes CMS-managed pages, news, gallery, notices, and portal login screens.',
            'body' => 'Makeni College of Education Zambia has prepared a new website foundation to support public communication and future digital services.',
            'published_at' => now()->toDateString(),
            'is_published' => true,
        ]);

        NewsPost::updateOrCreate(['slug' => 'teacher-education-programmes'], [
            'title' => 'Teacher Education Programmes Prepared for CMS Management',
            'excerpt' => 'Primary and secondary teacher diploma information can now be maintained from the admin panel.',
            'body' => 'The CMS includes programme management for college diploma offerings, with room for future admissions and student systems.',
            'published_at' => now()->subDays(2)->toDateString(),
            'is_published' => true,
        ]);

        Notice::updateOrCreate(['title' => 'Admissions enquiries are open'], [
            'body' => 'Contact the college for current admissions guidance and programme information.',
            'starts_at' => now()->toDateString(),
            'is_active' => true,
        ]);

        Notice::updateOrCreate(['title' => 'Portal pages are UI previews only'], [
            'body' => 'Staff, student, LMS, and exam portal screens are prepared for future system integration.',
            'starts_at' => now()->toDateString(),
            'is_active' => true,
        ]);
    }

    private function seedPortals(): void
    {
        foreach ([
            'staff' => ['Staff Portal', '/staff-portal', 'Staff login interface prepared for future staff services.'],
            'student' => ['Student Portal', '/student-portal', 'Student login interface prepared for future student services.'],
            'lms' => ['LMS Portal', '/lms-portal', 'Learning management login interface prepared for future LMS integration.'],
            'exam' => ['Exam Portal', '/exam-portal', 'Online exam login interface prepared for future examination services.'],
        ] as $key => [$label, $url, $description]) {
            PortalLink::updateOrCreate(['key' => $key], [
                'label' => $label,
                'url' => $url,
                'description' => $description,
                'is_active' => true,
            ]);
        }
    }
}
