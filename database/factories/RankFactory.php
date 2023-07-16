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
        $names = [
            ['ar' => 'المؤسس', 'en' => 'founder'],
            ['ar' => 'مدير العمليات التشغيلية', 'en' => 'COO'],
            ['ar' => 'المدير المالي', 'en' => 'CFO'],
            ['ar' => 'مدير التطوير', 'en' => 'CDO'],
            ['ar' => 'رئيس قسم تقنية المعلومات', 'en' => 'CITO'],
            ['ar' => 'مدير الإنتاج الفني', 'en' => 'Art Production Manager'],
            ['ar' => 'مدير التسويق', 'en' => 'Marketing Manager'],
            ['ar' => 'مدير إدارة المحتوى', 'en' => 'Content Management Director'],
            ['ar' => 'مدير إدارة المشاريع', 'en' => 'Project Management Director'],
            ['ar' => 'مدير تطوير البرمجيات', 'en' => 'Software Development Manager'],
            ['ar' => 'مهندس برمجيات', 'en' => 'Software Engineer'],
            ['ar' => 'مطور مواقع', 'en' => 'Website Developer'],
            ['ar' => 'مصمم جرافيكي', 'en' => 'Graphic Designer'],
            ['ar' => 'مسوق إلكتروني', 'en' => 'Online Marketers'],
            ['ar' => 'مسوق رقمي', 'en' => 'Digital Marketers'],
            ['ar' => 'مطور تطبيقات', 'en' => 'Application Developer'],
            ['ar' => 'مترجم', 'en' => 'Translator'],
            ['ar' => 'مؤقت', 'en' => 'Temp'],
            ['ar' => 'مستخدم', 'en' => 'User'],
        ];

        return [
            'name' => $this->faker->unique()->randomElement($names),
            'priority' => $this->faker->numberBetween(0, 400),
            'rank_type_id' => RankType::inRandomOrder()->first()->id,
        ];
    }
}
