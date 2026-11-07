
<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

interface Category {
    id: number
    name: string
    slug: string
    description: string
    icon: string
    story_count: number
}

defineProps<{
    category: Category
}>()
</script>

<template>
    <Link
        :href="`/categories/${category.slug}`"
        class="group block rounded-2xl
               border border-amber-400/10
               bg-[#102B20]
               p-6 text-center
               transition-all duration-300
               hover:-translate-y-1
               hover:border-amber-400/40
               hover:bg-[#183D2D]"
    >
        <!-- Category Icon -->
        <div
            class="mx-auto mb-5
                   flex h-16 w-16
                   items-center justify-center
                   rounded-2xl
                   border border-amber-400/20
                   bg-emerald-950
                   text-3xl
                   transition-transform
                   group-hover:scale-110"
        >
            {{ category.icon }}
        </div>

        <!-- Category Name -->
        <h2
            class="mb-3 text-xl font-bold
                   text-amber-300
                   transition-colors
                   group-hover:text-amber-200"
        >
            {{ category.name }}
        </h2>

        <!-- Description -->
        <p
            class="mb-5 text-sm
                   leading-7
                   text-emerald-100/60"
        >
            {{ category.description }}
        </p>

        <!-- Story Count -->
        <div
            class="inline-flex items-center
                   rounded-full
                   border border-emerald-400/10
                   bg-emerald-950
                   px-4 py-2
                   text-xs
                   text-emerald-300"
        >
            {{ category.story_count }} টি গল্প
        </div>

        <!-- Explore -->
        <div
            class="mt-5 text-sm
                   font-semibold
                   text-amber-400"
        >
            গল্প দেখুন →
        </div>
    </Link>
</template>
