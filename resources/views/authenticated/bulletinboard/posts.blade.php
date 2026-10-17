@php
    $like = new \App\Models\Posts\Like();
@endphp
<x-sidebar>
<div class="board_area w-100 m-auto d-flex">
  <div class="post_view mt-5" style="width: 70%;">
    @foreach($posts as $post)
    <div class="post_area border m-auto px-3 py-2"
     style="width: 85%; min-height: 100px; display: flex; flex-direction: column; justify-content: space-between;">
      <p class="mb-2"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p class="mb-2  "><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>

      <p class="mb-0">
          @foreach($post->subCategories as $subCategory)
              <span class="badge mr-0"
                    style="background-color: #04a9d2; color: white; border-radius: 8px; padding: 5px 8px;">
                  {{ $subCategory->sub_category }}
              </span>
          @endforeach
      </p>
      <div class="post_bottom_area d-flex justify-content-end">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fas fa-comment" style="color: #999999;"></i><span> {{ $post->commentCounts($post->id)}} </span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="far fa-heart like_btn"
                post_id="{{ $post->id }}"
                style="color: #999999;"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area" style="width: 30%; flex-shrink: 0; padding-top: 20px;">
    <div class="m-3 p-3">
      <div class="mb-3">
          <a href="{{ route('post.input') }}"
            class="btn btn-block"
            style="background-color: #04a9d2; color: white; border-radius: 8px;">
              投稿
          </a>
      </div>
      <div class="input-group mb-3">
          <input type="text" placeholder="キーワードを検索"
                  name="keyword" form="postSearchRequest"
                  class="form-control"
                  style="background-color: #ecf1f6;border-radius: 8px 0 0 8px;">
          <div class="input-group-append">
              <input type="submit" value="検索" form="postSearchRequest"
                    class="btn" style="background-color: #04a9d2; color: white; border-radius: 0 8px 8px 0;">
          </div>
      </div>
      <div class="d-flex mb-4">
          <input type="submit"
                name="like_posts"
                value="いいねした投稿"
                form="postSearchRequest"
                class="btn flex-fill mr-0"
                style="background-color: #e38eab; color: white; font-size: 12px; border-radius: 8px;">

          <input type="submit"
                name="my_posts"
                value="自分の投稿"
                form="postSearchRequest"
                class="btn flex-fill ml-0"
                style="background-color: #ebbc5d; color: white; font-size: 12px; border-radius: 8px;">
      </div>
      <p class=" mt-4 mb-3">カテゴリー検索</p>
      <ul class="pl-0">
          @foreach($categories as $category)
              <li class="main_categories py-2"
                  category_id="{{ $category->id }}">
                  <div class="d-flex justify-content-between align-items-center w-100 pb-2"
                  style="border-bottom: 1px solid #c5cbd1;">
                      <span>{{ $category->main_category }}</span>
                      <i class="fas fa-chevron-down category_arrow"></i>
                  </div>

                  <ul class="sub_categories category_num{{ $category->id }} pl-3 mt-2">
                      @foreach($category->subCategories as $sub_category)
                          <li class="py-2 mr-4" style="border-bottom: 1px solid #c5cbd1;">
                              <a href="{{ route('post.show', ['category_word' => $sub_category->id]) }}">
                                  {{ $sub_category->sub_category }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </li>
          @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
