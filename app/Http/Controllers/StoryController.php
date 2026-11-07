<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\StoryPage;

class StoryController extends Controller
{
    private function stories(): array
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'আসহাবে উখদুদের গল্প',
                'category' => 'কুরআনের গল্প',
                'age' => '৯-১২ বছর',
                'icon' => '🌙',
                'premium' => false,
                'description' => 'ঈমান, ধৈর্য এবং সত্যের পথে অবিচল থাকার হৃদয়স্পর্শী কাহিনি।',
                'content' => [
                    'এক সময় এক বাদশাহ ছিল। তার রাজ্যে একজন ঈমানদার বালক বাস করত। বালকটি আল্লাহর প্রতি গভীর বিশ্বাস রাখত।',
                    'নানা পরীক্ষার মধ্যেও সে সত্যের পথ থেকে বিচ্যুত হয়নি। তার ঈমান ও ধৈর্য ছিল অত্যন্ত দৃঢ়।',
                    'এই গল্প আমাদের ঈমান, ধৈর্য ও আল্লাহর প্রতি বিশ্বাসের শিক্ষা দেয়।',
                ],
            ],

            2 => [
                'id' => 2,
                'title' => 'একজন বুদ্ধিমান বালক',
                'category' => 'নেককারদের গল্প',
                'age' => '৬-৮ বছর',
                'icon' => '📖',
                'premium' => true,
                'description' => 'বুদ্ধিমত্তা, সাহস ও আল্লাহর প্রতি বিশ্বাসের গল্প।',
                'content' => [
                    'একজন বুদ্ধিমান বালক তার জ্ঞান ও সাহস দিয়ে কঠিন পরিস্থিতির মোকাবিলা করেছিল।',
                    'সে সব সময় সত্য কথা বলত এবং আল্লাহর উপর ভরসা রাখত।',
                    'তার জীবন থেকে আমরা বুদ্ধিমত্তা, সাহস এবং সততার শিক্ষা পাই।',
                ],
            ],

            3 => [
                'id' => 3,
                'title' => 'হযরত ইউসুফ (আ.)-এর কাহিনি',
                'category' => 'নবীদের গল্প',
                'age' => '৯-১২ বছর',
                'icon' => '✨',
                'premium' => false,
                'description' => 'সবর, ক্ষমা ও উত্তম চরিত্রের শিক্ষায় সমৃদ্ধ কাহিনি।',
                'content' => [
                    'হযরত ইউসুফ (আ.)-এর জীবন ছিল ধৈর্য, সততা ও ক্ষমার এক মহান উদাহরণ।',
                    'নানা কষ্ট ও পরীক্ষার পর আল্লাহ তাঁকে সম্মানিত করেছিলেন।',
                    'তাঁর জীবন থেকে আমরা শিখি যে আল্লাহর উপর ভরসা রাখতে হয় এবং অন্যদের ক্ষমা করতে হয়।',
                ],
            ],

            4 => [
                'id' => 4,
                'title' => 'সৎ রাখালের গল্প',
                'category' => 'নৈতিক শিক্ষার গল্প',
                'age' => '৩-৫ বছর',
                'icon' => '🐑',
                'premium' => false,
                'description' => 'সততা ও আমানতদারিতার সুন্দর শিক্ষা।',
                'content' => [
                    'একজন রাখাল তার পশুগুলো যত্ন করে দেখাশোনা করত।',
                    'সে কখনো মিথ্যা বলত না। সবাই তাকে বিশ্বাস করত।',
                    'এই গল্প আমাদের সততা ও আমানতদারিতার শিক্ষা দেয়।',
                ],
            ],

            5 => [
                'id' => 5,
                'title' => 'আসহাবে কাহাফ',
                'category' => 'কুরআনের গল্প',
                'age' => '৯-১২ বছর',
                'icon' => '🌌',
                'premium' => false,
                'description' => 'ঈমান ও আল্লাহর রহমতের এক বিস্ময়কর কাহিনি।',
                'content' => [
                    'কয়েকজন ঈমানদার যুবক তাদের ঈমান রক্ষার জন্য একটি গুহায় আশ্রয় নিয়েছিলেন।',
                    'আল্লাহ তাঁদের দীর্ঘ সময় ঘুমিয়ে রাখেন এবং পরে জাগিয়ে তোলেন।',
                    'এই ঘটনা ঈমান ও আল্লাহর অসীম ক্ষমতার নিদর্শন।',
                ],
            ],

            6 => [
                'id' => 6,
                'title' => 'হযরত ইবরাহিম (আ.)',
                'category' => 'নবীদের গল্প',
                'age' => '৬-৮ বছর',
                'icon' => '⭐',
                'premium' => true,
                'description' => 'তাওহিদ ও আল্লাহর প্রতি আনুগত্যের গল্প।',
                'content' => [
                    'হযরত ইবরাহিম (আ.) ছিলেন মহান আল্লাহর একজন নবী।',
                    'তিনি মানুষকে এক আল্লাহর ইবাদত করার আহ্বান জানিয়েছিলেন।',
                    'তাঁর জীবন থেকে আমরা তাওহিদ, সাহস ও আনুগত্যের শিক্ষা পাই।',
                ],
            ],

            7 => [
                'id' => 7,
                'title' => 'সত্যবাদী বালক',
                'category' => 'নৈতিক শিক্ষার গল্প',
                'age' => '৩-৫ বছর',
                'icon' => '🌱',
                'premium' => false,
                'description' => 'সত্য কথা বলার সুন্দর শিক্ষা।',
                'content' => [
                    'একটি ছোট বালক সব সময় সত্য কথা বলত।',
                    'একদিন সে একটি ভুল করেছিল। কিন্তু সে ভয় না পেয়ে সত্য কথা বলেছিল।',
                    'সবাই তার সততার প্রশংসা করেছিল।',
                ],
            ],

            8 => [
                'id' => 8,
                'title' => 'দয়ালু খলিফা',
                'category' => 'সাহাবীদের গল্প',
                'age' => '৯-১২ বছর',
                'icon' => '🏰',
                'premium' => false,
                'description' => 'ন্যায়বিচার ও মানুষের প্রতি দয়ার গল্প।',
                'content' => [
                    'একজন দয়ালু শাসক সব সময় মানুষের কল্যাণের কথা চিন্তা করতেন।',
                    'তিনি ন্যায়বিচার করতেন এবং অসহায় মানুষদের সাহায্য করতেন।',
                    'তাঁর জীবন আমাদের দয়া ও ন্যায়বিচারের শিক্ষা দেয়।',
                ],
            ],
        ];
    }

    public function show(string $story): Response
    {
        $stories = $this->stories();

        abort_if(! isset($stories[(int) $story]), 404);

        return Inertia::render('Stories/Show', [
            'story' => $stories[(int) $story],
        ]);
    }

    public function read(string $story): Response
    {
        $stories = $this->stories();

        $storyId = (int) $story;

        abort_if(! isset($stories[$storyId]), 404);
		
		$pages = StoryPage::query()
		->where('story_id', $storyId)
		->orderBy('page_number')
		->get([
			'page_number',
			'paragraph',
			'image_url',
			'audio_url',
		]);
	

        $storyIds = array_keys($stories);

        $currentIndex = array_search(
            $storyId,
            $storyIds,
            true
        );

        $previousStoryId = $currentIndex > 0
            ? $storyIds[$currentIndex - 1]
            : null;

        $nextStoryId = $currentIndex < count($storyIds) - 1
            ? $storyIds[$currentIndex + 1]
            : null;

        return Inertia::render('Stories/Read', [
            'story' => $stories[$storyId],
			 'pages' => $pages,
            'previousStoryId' => $previousStoryId,
            'nextStoryId' => $nextStoryId,
        ]);
    }

    
public function categoryIndex(): Response
{
    $stories = $this->stories();

    $categoryData = [
        [
            'id' => 1,
            'name' => 'কুরআনের গল্প',
            'slug' => 'quran-stories',
            'icon' => '📖',
            'description' => 'পবিত্র কুরআনে বর্ণিত শিক্ষণীয় গল্প।',
        ],
        [
            'id' => 2,
            'name' => 'নবীদের গল্প',
            'slug' => 'prophets-stories',
            'icon' => '🌙',
            'description' => 'আল্লাহর নবীদের জীবন ও শিক্ষা।',
        ],
        [
            'id' => 3,
            'name' => 'সাহাবীদের গল্প',
            'slug' => 'sahaba-stories',
            'icon' => '⭐',
            'description' => 'সাহাবীদের জীবন ও আদর্শের গল্প।',
        ],
        [
            'id' => 4,
            'name' => 'নেককারদের গল্প',
            'slug' => 'righteous-stories',
            'icon' => '🕌',
            'description' => 'নেককার ব্যক্তিদের জীবন থেকে শিক্ষা।',
        ],
        [
            'id' => 5,
            'name' => 'নৈতিক শিক্ষার গল্প',
            'slug' => 'moral-stories',
            'icon' => '🌿',
            'description' => 'সততা, দয়া ও উত্তম চরিত্রের গল্প।',
        ],
    ];

    $categories = collect($categoryData)->map(function ($category) use ($stories) {
        $category['story_count'] = collect($stories)
            ->where('category', $category['name'])
            ->count();

        return $category;
    });

    return Inertia::render('Categories/Index', [
        'categories' => $categories,
    ]);
}




public function categoryShow(string $slug): Response
{
    $categoryData = [
        'quran-stories' => [
            'name' => 'কুরআনের গল্প',
            'slug' => 'quran-stories',
            'icon' => '📖',
            'description' => 'পবিত্র কুরআনে বর্ণিত শিক্ষণীয় গল্প।',
        ],

        'prophets-stories' => [
            'name' => 'নবীদের গল্প',
            'slug' => 'prophets-stories',
            'icon' => '🌙',
            'description' => 'আল্লাহর নবীদের জীবন ও শিক্ষা।',
        ],

        'sahaba-stories' => [
            'name' => 'সাহাবীদের গল্প',
            'slug' => 'sahaba-stories',
            'icon' => '⭐',
            'description' => 'সাহাবীদের জীবন ও আদর্শের গল্প।',
        ],

        'righteous-stories' => [
            'name' => 'নেককারদের গল্প',
            'slug' => 'righteous-stories',
            'icon' => '🕌',
            'description' => 'নেককার ব্যক্তিদের জীবন থেকে শিক্ষা।',
        ],

        'moral-stories' => [
            'name' => 'নৈতিক শিক্ষার গল্প',
            'slug' => 'moral-stories',
            'icon' => '🌿',
            'description' => 'সততা, দয়া ও উত্তম চরিত্রের গল্প।',
        ],
    ];

    abort_if(! isset($categoryData[$slug]), 404);

    $category = $categoryData[$slug];

    $stories = collect($this->stories())
        ->where('category', $category['name'])
        ->values()
        ->map(function ($story) {
            unset($story['content']);

            return $story;
        });

    return Inertia::render('Categories/Show', [
        'category' => $category,
        'stories' => $stories,
    ]);
}


}


