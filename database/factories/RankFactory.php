<?php

namespace Database\Factories;

use App\Models\RankType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class RankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ranks = [
            'founder' => ['ar' => 'المؤسس', 'en' => 'founder'],
            'coo' => ['ar' => 'مدير العمليات التشغيلية', 'en' => 'COO'],
            'cfo' => ['ar' => 'المدير المالي', 'en' => 'CFO'],
            'cdo' => ['ar' => 'مدير التطوير', 'en' => 'CDO'],
            'cito' => ['ar' => 'رئيس قسم تقنية المعلومات', 'en' => 'CITO'],
            'art-production-manager' => ['ar' => 'مدير الإنتاج الفني', 'en' => 'Art Production Manager'],
            'marketing-manager' => ['ar' => 'مدير التسويق', 'en' => 'Marketing Manager'],
            'content-management-director' => ['ar' => 'مدير إدارة المحتوى', 'en' => 'Content Management Director'],
            'project-management-director' => ['ar' => 'مدير إدارة المشاريع', 'en' => 'Project Management Director'],
            'software-development-manager' => ['ar' => 'مدير تطوير البرمجيات', 'en' => 'Software Development Manager'],
            'software-engineer' => ['ar' => 'مهندس برمجيات', 'en' => 'Software Engineer'],
            'website-developer' => ['ar' => 'مطور مواقع', 'en' => 'Website Developer'],
            'graphic-designer' => ['ar' => 'مصمم جرافيكي', 'en' => 'Graphic Designer'],
            'online-marketer' => ['ar' => 'مسوق إلكتروني', 'en' => 'Online Marketers'],
            'digital-marketer' => ['ar' => 'مسوق رقمي', 'en' => 'Digital Marketers'],
            'application-developer' => ['ar' => 'مطور تطبيقات', 'en' => 'Application Developer'],
            'translator' => ['ar' => 'مترجم', 'en' => 'Translator'],
            'temp' => ['ar' => 'مؤقت', 'en' => 'Temp'],
            'default-user' => ['ar' => 'مستخدم', 'en' => 'User'],
        ];

        $key = $this->faker->unique()->randomElement(array_keys($ranks));

        return [
            'name' => $ranks[$key],
            'key' => $key,
            'priority' => $this->faker->numberBetween(0, 400),
            'rank_type_id' => RankType::inRandomOrder()->first()->id,
        ];
    }
}
