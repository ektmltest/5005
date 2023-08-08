<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'manage-projects' => ['ar' => 'ادارة المشاريع', 'en' => 'manage projects'],
            'manage-projects-sections' => ['ar' => 'ادارة اقسام المشاريع', 'en' => 'manage projects sections'],
            'manage-projects-categories' => ['ar' => 'ادارة تصنيفات المشاريع', 'en' => 'manage projects categories'],
            'manage-catalog-projects' => ['ar' => 'ادارة مشاريع الكاتالوج', 'en' => 'manage catalog projects'],
            'edit-catalog-projects' => ['ar' => 'تعديل مشاريع الكاتالوج', 'en' => 'edit catalog projects'],
            'create-catalog-projects' => ['ar' => 'انشاء مشاريع الكاتالوج', 'en' => 'create new catalog projects'],
            'manage-catalog-projects-categories' => ['ar' => 'ادارة تصنيفات مشاريع الكاتالوج', 'en' => 'manage catalog projects categories'],
            'manage-catalog-addons' => ['ar' => 'ادارة اضافات مشاريع الكاتالوج', 'en' => 'manage addons of catalog projects'],
            'manage-tickets' => ['ar' => 'ادارة نظام التذاكر', 'en' => 'manage tickets system'],
            'manage-tickets-types' => ['ar' => 'ادارة انواع التذاكر', 'en' => 'manage type of tickets'],
            'manage-users' => ['ar' => 'ادارة الاعضاء', 'en' => 'manage members'],
            'manage-ranks' => ['ar' => 'ادارة الرتب', 'en' => 'manage roles'],
            'manage-rank-permissions' => ['ar' => 'ادارة صلاحيات الرتب', 'en' => 'manage roles permissions'],
            'edit-ranks' => ['ar' => 'تعديل الرتب', 'en' => 'edit roles'],
            'manage-gallery' => ['ar' => 'ادارة معرض الاعمال', 'en' => 'manage gallery'],
            'manage-gallery-types' => ['ar' => 'ادارة تصنيفات معرض الاعمال', 'en' => 'manage gallery categories'],
            'manage-qas' => ['ar' => 'ادارة الاسئلة الشائعة', 'en' => 'manage faq'],
            'manage-qas-types' => ['ar' => 'ادارة انواع الاسئلة الشائعة', 'en' => 'manage faq types or headlines'],
            'manage-platforms' => ['ar' => 'ادارة منصاتنا', 'en' => 'manage our platforms'],
            'manage-charges' => ['ar' => 'ادارة نظام الشحونات', 'en' => 'manage charging system'],
            'manage-withdrawals' => ['ar' => 'ادارة نظام السحب', 'en' => 'manage withdraws'],
            'manage-translations' => ['ar' => 'ادارة نظام الترجمة', 'en' => 'manage translation system'],
            'manage-settings' => ['ar' => 'ادارة اعدادات الموقع', 'en' => 'manage site settings'],
            'manage-posts' => ['ar' => 'ادارة المنشورات', 'en' => 'manage posts'],
            'create-posts' => ['ar' => 'انشاء منشورات', 'en' => 'create posts'],
        ];

        $key = $this->faker->unique()->randomElement(array_keys($names));
        return [
            'name' => $names[$key],
            'key' => $key,
        ];
    }
}
