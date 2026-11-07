<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { computed, ref } from 'vue'


import Navbar from '@/components/Shared/Navbar.vue'

interface Category {
    name: string
    slug: string
    description: string
    icon: string
}

interface Story {
    id: number
    title: string
    category: string
    age: string
    icon: string
    premium: boolean
    description: string
}

const props = defineProps<{
    category: Category
    stories: Story[]
}>()

const searchQuery = ref('')
const selectedAge = ref('all')

const filteredStories = computed(() => {
    let result = props.stories

    const query = searchQuery.value.trim().toLowerCase()

    if (query) {
        result = result.filter((story) => {
            return (
                story.title.toLowerCase().includes(query) ||
                story.description.toLowerCase().includes(query)
            )
        })
    }

    if (selectedAge.value !== 'all') {
        result = result.filter((story) => {
            return story.age === selectedAge.value
        })
    }

    return result
})





</script>

<template>
    <Head :title="`${category.name} | IslamicStoryBook`" />

    <div
        class="min-h-screen bg-[#0B1F16]
               font-['Hind_Siliguri']
               text-emerald-50"
    >
        <Navbar />

        <!-- Hero Section -->
        <section
            class="border-b border-amber-400/10
                   bg-gradient-to-b
                   from-[#183D2D] to-[#0B1F16]"
        >
            <div
                class="mx-auto max-w-7xl
                       px-5 py-14
                       text-center sm:px-8"
            >
                <div class="mb-5 text-6xl">
                    {{ category.icon }}
                </div>

                <p
                    class="mb-3 text-xs font-bold
                           tracking-[0.2em]
                           text-amber-400"
                >
                    STORY COLLECTION
                </p>

                <h1
                    class="text-3xl font-bold
                           leading-relaxed
                           text-amber-300
                           sm:text-5xl"
                >
                    {{ category.name }}
                </h1>

                <p
                    class="mx-auto mt-5 max-w-2xl
                           text-base leading-8
                           text-emerald-100/60
                           sm:text-lg"
                >
                    {{ category.description }}
                </p>

                <div
                    class="mt-8 flex flex-wrap
                           justify-center gap-3
                           text-sm"
                >
                    <Link
                        href="/"
                        class="text-emerald-100/50
                               hover:text-amber-300"
                    >
                        হোম
                    </Link>

                    <span class="text-emerald-100/30">
                        /
                    </span>

                    <Link
                        href="/categories"
                        class="text-emerald-100/50
                               hover:text-amber-300"
                    >
                        গল্পের বিভাগ
                    </Link>

                    <span class="text-emerald-100/30">
                        /
                    </span>

                    <span class="text-amber-300">
                        {{ category.name }}
                    </span>
                </div>
            </div>
        </section>

        <!-- Stories -->
        <main
            class="mx-auto max-w-7xl
                   px-5 py-12 sm:px-8"
        >
		
		<!-- Search & Age Filter -->
			<section
				class="mb-10 grid grid-cols-1
					   gap-5 sm:grid-cols-2
					   rounded-2xl
					   border border-amber-400/10
					   bg-[#102B20]
					   p-5 sm:p-8"
			>
				<!-- Search -->
				<div>
					<label
						for="story-search"
						class="mb-3 block
							   font-bold text-amber-300"
					>
						🔎 গল্প খুঁজুন
					</label>

					<input
						id="story-search"
						v-model="searchQuery"
						type="search"
						placeholder="গল্পের নাম লিখুন..."
						class="w-full rounded-xl
							   border border-amber-400/15
							   bg-[#0B1F16]
							   px-4 py-3
							   text-emerald-50
							   placeholder:text-emerald-100/30
							   outline-none
							   focus:border-amber-400/50"
					/>
				</div>

				<!-- Age Filter -->
				<div>
					<label
						for="age-filter"
						class="mb-3 block
							   font-bold text-amber-300"
					>
						👦 বয়স অনুযায়ী গল্প
					</label>

					<select
						id="age-filter"
						v-model="selectedAge"
						class="w-full rounded-xl
							   border border-amber-400/15
							   bg-[#0B1F16]
							   px-4 py-3
							   text-emerald-50
							   outline-none
							   focus:border-amber-400/50"
					>
						<option value="all">
							সকল বয়স
						</option>

						<option value="৩-৫ বছর">
							৩-৫ বছর
						</option>

						<option value="৬-৮ বছর">
							৬-৮ বছর
						</option>

						<option value="৯-১২ বছর">
							৯-১২ বছর
						</option>
					</select>
				</div>
			</section>


		
		
		 <!-- Category Header -->
		
            <div
                class="mb-8 flex flex-wrap
                       items-center
                       justify-between gap-4"
            >
                <div>
                    <p
                        class="mb-2 text-xs
                               font-bold tracking-widest
                               text-amber-400"
                    >
                        EXPLORE STORIES
                    </p>

                    <h2
                        class="text-2xl font-bold
                               text-amber-300
                               sm:text-3xl"
                    >
                        {{ category.name }}
                    </h2>
                </div>

                <span
                    class="rounded-full
                           border border-amber-400/15
                           bg-[#102B20]
                           px-4 py-2
                           text-sm text-amber-300"
                >
                    {{ filteredStories.length }} টি গল্প
                </span>
            </div>

            <!-- Story Grid -->
            <section
                v-if="filteredStories.length > 0"
                class="grid grid-cols-1
                       gap-5 sm:grid-cols-2
                       lg:grid-cols-3"
            >
                <article
                    v-for="story in filteredStories"
                    :key="story.id"
                    class="group flex flex-col
                           rounded-2xl
                           border border-amber-400/10
                           bg-[#102B20]
                           p-6 transition
                           hover:-translate-y-1
                           hover:border-amber-400/30"
                >
                    <div
                        class="mb-5 flex
                               items-center
                               justify-between"
                    >
                        <div
                            class="flex h-14 w-14
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-emerald-900/50
                                   text-3xl"
                        >
                            {{ story.icon }}
                        </div>

                        <span
                            v-if="story.premium"
                            class="rounded-full
                                   bg-amber-400
                                   px-3 py-1
                                   text-xs font-bold
                                   text-[#102B20]"
                        >
                            PREMIUM
                        </span>
                    </div>

                    <h3
                        class="text-xl font-bold
                               leading-relaxed
                               text-amber-300
                               transition
                               group-hover:text-amber-200"
                    >
                        {{ story.title }}
                    </h3>

                    <p
                        class="mt-3 flex-grow
                               text-sm leading-7
                               text-emerald-100/60"
                    >
                        {{ story.description }}
                    </p>

                    <div
                        class="mt-5 flex
                               items-center
                               justify-between
                               border-t
                               border-amber-400/10
                               pt-4"
                    >
                        <span
                            class="rounded-full
                                   bg-emerald-500/10
                                   px-3 py-1
                                   text-xs
                                   text-emerald-200"
                        >
                            {{ story.age }}
                        </span>

                        <Link
                            :href="`/stories/${story.id}`"
                            class="font-bold
                                   text-amber-300
                                   transition
                                   hover:text-amber-200"
                        >
                            গল্প পড়ুন →
                        </Link>
                    </div>
                </article>
            </section>

            <!-- Empty State -->
           <section
				v-else
				class="rounded-2xl
					   border border-amber-400/10
					   bg-[#102B20]
					   px-6 py-16
					   text-center"
			>
				<div class="mb-5 text-5xl">
					📚
				</div>

				<h3
					class="text-xl font-bold
						   text-amber-300"
				>
					কোনো গল্প পাওয়া যায়নি
				</h3>

				<p
					class="mt-3
						   text-emerald-100/50"
				>
					অন্য নাম দিয়ে Search করুন
					অথবা বয়সের Filter পরিবর্তন করুন।
				</p>

				<button
					type="button"
					@click="searchQuery = ''; selectedAge = 'all'"
					class="mt-6 rounded-xl
						   bg-amber-400
						   px-5 py-3
						   font-bold
						   text-[#102B20]
						   hover:bg-amber-300"
				>
					সকল গল্প দেখুন
				</button>
			</section>
        </main>

        <!-- Footer -->
        <footer
            class="border-t border-amber-400/10
                   bg-[#081810]
                   px-5 py-8
                   text-center"
        >
            <p
                class="text-sm
                       text-emerald-100/50"
            >
                © {{ new Date().getFullYear() }}
                IslamicStoryBook.
                সকল স্বত্ব সংরক্ষিত।
            </p>

            <p
                class="mt-2 text-xs
                       text-amber-400/60"
            >
                Stories of the Righteous
            </p>
        </footer>
    </div>
</template>