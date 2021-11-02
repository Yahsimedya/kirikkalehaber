<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string|null $link
 * @property string $ads
 * @property int $category_id
 * @property int|null $type
 * @property int|null $status
 * @property string|null $ad_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereAdCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereAds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUpdatedAt($value)
 */
	class Ad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AdCategory
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdCategory whereUpdatedAt($value)
 */
	class AdCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Authors
 *
 * @property int $id
 * @property string $image
 * @property string $name
 * @property int $status
 * @property string|null $mail
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $youtube
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Authors newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authors newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Authors query()
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Authors whereYoutube($value)
 */
	class Authors extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AuthorsPost
 *
 * @property int $id
 * @property int $authors_id
 * @property string $image
 * @property string $text
 * @property string $title
 * @property int $status
 * @property string|null $keywords
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereAuthorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthorsPost whereUpdatedAt($value)
 */
	class AuthorsPost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $category_en
 * @property string $category_tr
 * @property string|null $category_keywords
 * @property string|null $category_description
 * @property string|null $category_icon
 * @property int $category_status
 * @property int $category_order
 * @property string|null $soft_delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSoftDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\District
 *
 * @property int $id
 * @property string $district_en
 * @property string $district_tr
 * @property string|null $district_keywords
 * @property string|null $district_description
 * @property string|null $district_icon
 * @property string $slug
 * @property string|null $district_status
 * @property string|null $district_order
 * @property string|null $soft_delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDistrictTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereSoftDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Photo
 *
 * @property int $id
 * @property string $photo
 * @property string $title
 * @property string $type
 * @property string|null $photocategory_id
 * @property int $status
 * @property string|null $keywords_tr
 * @property string|null $description_tr
 * @property string|null $keywords_en
 * @property string|null $photo_text
 * @property string|null $description_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDescriptionTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereKeywordsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereKeywordsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo wherePhotoText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo wherePhotocategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 */
	class Photo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Photocategory
 *
 * @property int $id
 * @property string $category_title
 * @property int $status
 * @property string|null $keywords_tr
 * @property string|null $description_tr
 * @property string|null $keywords_en
 * @property string|null $description_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereCategoryTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereDescriptionTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereKeywordsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereKeywordsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photocategory whereUpdatedAt($value)
 */
	class Photocategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Photos
 *
 * @property int $id
 * @property string $photo
 * @property string $title
 * @property string $type
 * @property string|null $photocategory_id
 * @property int $status
 * @property string|null $keywords_tr
 * @property string|null $description_tr
 * @property string|null $keywords_en
 * @property string|null $photo_text
 * @property string|null $description_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Photos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereDescriptionTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereKeywordsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereKeywordsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos wherePhotoText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos wherePhotocategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photos whereUpdatedAt($value)
 */
	class Photos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $subcategory_id
 * @property int $district_id
 * @property int|null $subdistrict_id
 * @property int $user_id
 * @property string $title_tr
 * @property string|null $title_en
 * @property string $image
 * @property string|null $details_tr
 * @property string|null $details_en
 * @property string|null $tags_tr
 * @property string|null $tags_en
 * @property string|null $keywords_tr
 * @property string|null $description_tr
 * @property string|null $keywords_en
 * @property string|null $description_en
 * @property int|null $manset
 * @property int|null $headline
 * @property int|null $featured
 * @property int|null $surmanset
 * @property int|null $surmanset_photo
 * @property int|null $bigthumbnail
 * @property string|null $post_date
 * @property string|null $post_month
 * @property string|null $status
 * @property string|null $posts_video
 * @property string $slug_tr
 * @property string $slug_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read mixed $published
 * @property-read \App\Models\PostTag $posttags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tag
 * @property-read int|null $tag_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post drafted()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBigthumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescriptionTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDetailsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDetailsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereKeywordsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereKeywordsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereManset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostsVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlugEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlugTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubdistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSurmanset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSurmansetPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTagsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTagsTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitleTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PostTag
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $tag_id
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostTag whereTagId($value)
 */
	class PostTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sehirler
 *
 * @property int $id
 * @property string $sehir_ad
 * @property int $ilce_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler whereIlceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler whereSehirAd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sehirler whereUpdatedAt($value)
 */
	class Sehirler extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Seos
 *
 * @property int $id
 * @property string $meta_author
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $google_analytics
 * @property string $google_verification
 * @property string $alexa_analytics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Seos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereAlexaAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereGoogleAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereGoogleVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereMetaAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereMetaKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seos whereUpdatedAt($value)
 */
	class Seos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subcategory
 *
 * @property int $id
 * @property string $category_id
 * @property string $subcategory_en
 * @property string $subcategory_tr
 * @property string|null $subcategory_keywords
 * @property string|null $subcategory_description
 * @property string|null $subcategory_status
 * @property string|null $subcategory_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSubcategoryTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereUpdatedAt($value)
 */
	class Subcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subdistrict
 *
 * @property int $id
 * @property string $district_id
 * @property string $subdistrict_en
 * @property string $subdistrict_tr
 * @property int $slug
 * @property string|null $subdistrict_keywords
 * @property string|null $subdistrict_description
 * @property string|null $subdistrict_status
 * @property string|null $subdistrict_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereSubdistrictTr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdistrict whereUpdatedAt($value)
 */
	class Subdistrict extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WebsiteSetting
 *
 * @property int $id
 * @property string $logo
 * @property string $adress
 * @property string $phone
 * @property string $email
 * @property string $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereAdress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebsiteSetting whereUpdatedAt($value)
 */
	class WebsiteSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\fixedpage
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $keyword
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|fixedpage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|fixedpage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|fixedpage query()
 */
	class fixedpage extends \Eloquent {}
}

