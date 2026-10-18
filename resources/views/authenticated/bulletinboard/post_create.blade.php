<x-sidebar>
<div class="post_create_container d-flex">
  <div class="post_create_area border m-5 p-5" style="width: 52%;">
    <div class="">
      <p class="mb-0">カテゴリー</p>
      <select class="w-100" style="border: 0.5px solid #6b7280;" form="postCreate" name="post_category_id">
        @foreach($main_categories as $main_category)
        <optgroup label="{{ $main_category->main_category }}">
          @foreach($main_category->subCategories as $sub_category)
              <option value="{{ $sub_category->id }}">
                  {{ $sub_category->sub_category }}
              </option>
          @endforeach
        <!-- サブカテゴリー表示 -->
        </optgroup>
        @endforeach
      </select>
    </div>
    <div class="mt-2">
      @if($errors->first('post_title'))
      <span class="error_message">{{ $errors->first('post_title') }}</span>
      @endif
      <p class="mb-0">タイトル</p>
      <input type="text" class="w-100" style="border: 0.5px solid #6b7280;" form="postCreate" name="post_title" value="{{ old('post_title') }}">
    </div>
    <div class="mt-2">
      @if($errors->first('post_body'))
      <span class="error_message">{{ $errors->first('post_body') }}</span>
      @endif
      <p class="mb-0">投稿内容</p>
      <textarea class="w-100" style="border: 0.5px solid #6b7280;" form="postCreate" name="post_body">{{ old('post_body') }}</textarea>
    </div>
    <div class="mt-2 text-right">
      <input type="submit" class="btn btn-primary" value="投稿" form="postCreate">
    </div>
    <form action="{{ route('post.create') }}" method="post" id="postCreate">{{ csrf_field() }}</form>
  </div>
  @can('admin')
  <div class="ml-auto mr-auto" style="width: 30%;">
    <div class="category_area mt-5 px-5" style="padding-top: 30px; padding-bottom: 30px;">
      <div class="">
            @if($errors->first('main_category_name'))
                <span class="error_message">
                    {{ $errors->first('main_category_name') }}
                </span>
            @endif
        <p class="mb-1">メインカテゴリー</p>
        <input type="text"
                class="w-100 form-control mb-2"
                style="height: 26px;"
                name="main_category_name"
                form="mainCategoryRequest">

          <input type="submit"
                value="追加"
                class="w-100 btn btn-primary"
                style="height: 26px; padding: 2px 8px;"
                form="mainCategoryRequest">
      </div>
      <!-- サブカテゴリー追加 -->
          <div class="mt-4">
              @if($errors->first('sub_category_name'))
                  <span class="error_message">
                      {{ $errors->first('sub_category_name') }}
                  </span>
              @endif

              <p class="m-1">サブカテゴリー</p>
              @if($errors->first('main_category_id'))
                  <span class="error_message">
                      {{ $errors->first('main_category_id') }}
                  </span>
              @endif

              <select class="w-100 form-control mb-2"
                      style="height: 26px;"
                      name="main_category_id"
                      form="subCategoryRequest">
                  @foreach($main_categories as $main_category)
                      <option value="{{ $main_category->id }}">
                          {{ $main_category->main_category }}
                      </option>
                  @endforeach
              </select>

              <input type="text"
                      class="w-100 form-control mb-2"
                      style="height: 26px;"
                      name="sub_category_name"
                      form="subCategoryRequest">

              <input type="submit"
                      value="追加"
                      class="w-100 btn btn-primary"
                      style="height: 26px; padding: 2px 8px;"
                      form="subCategoryRequest">
          </div>
      <form action="{{ route('main.category.create') }}" method="post" id="mainCategoryRequest">{{ csrf_field() }}</form>
      <form action="{{ route('sub.category.create') }}" method="post" id="subCategoryRequest">{{ csrf_field() }}</form>
    </div>
  </div>
  @endcan
</div>
</x-sidebar>
