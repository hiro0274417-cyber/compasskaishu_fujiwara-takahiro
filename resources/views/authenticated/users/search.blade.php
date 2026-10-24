<x-sidebar>
<div class="search_content w-100  d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border border-light one_person">
      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span>女</span>
        @else
        <span>性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span>役職 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>役職 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>役職 : </span><span>講師(英語)</span>
        @else
        <span>役職 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
          <span>選択科目 :</span>
          @foreach($user->subjects as $subject)
            <span>{{ $subject->subject }}</span>
          @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 p-3 d-flex-column mt-5">
    <h5 class="mb-3" style="color: #607D98;">検索</h5>
    <div class="">
      <div class="mb-3">
        <input type="text" class="free_word rounded border-0 py-2 px-2"
        style="background-color: #E5E5E5; font-size: 13px; height: 40px; width:210px;"name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="mb-3" style="display: flex; flex-direction: column; align-items: flex-start;">
        <label class="mb-1 small" style="color:#607D98;">カテゴリ</label>
        <select class="rounded border-0 py-1 px-1" style="background-color: #E5E5E5;" name="category" form="userSearchRequest">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="mb-3 small" style="display: flex; flex-direction: column; align-items: flex-start;">
        <label class="mb-1" style="color:#607D98;">並び替え</label>
        <select class="rounded border-0 py-1 px-1" style="background-color: #E5E5E5; width: 75px; height:32px;" name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="mb-5" style="width:210px;">
        <p class="m-0 search_conditions small d-flex justify-content-between align-items-center border-bottom pb-2" style="color: #607D98; border-bottom-color: #999999 !important;">
            <span>検索条件の追加</span>
            <span class="search_arrow"></span>
        </p>
        <div class="search_conditions_inner pt-3">
          <div class="mb-3">
            <label class="d-block mb-1" style="color:#607D98;">性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div class="mb-3">
            <label class="d-block mb-1" style="color:#607D98;">権限</label>
            <select name="role" form="userSearchRequest" class="engineer rounded border-0" style="background-color: #E5E5E5; width: 100px; height: 32px;">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer d-flex flex-wrap gap-2">
            <label class="w-100 mb-0" style="color:#607D98;">選択科目</label>
            @foreach($subjects as $subject)
             <div>
              <label>
                {{$subject->subject}}
                <input type="checkbox"
                       name="subjects[]"
                       value="{{$subject->id}}"
                       form="userSearchRequest">
              </label>
             </div>
             @endforeach
          </div>
        </div>
      </div>
      <div style="width:210px;">
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="border-0 rounded w-100 py-2" style="background-color: #03AAD2; color:#FFF;">
      </div>
      <div class="text-center mt-4" style="width:210px;">
        <input type="reset" class="border-0" value="リセット" form="userSearchRequest" style="color:#03AAD2; background: transparent;" >
      </div>

    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
</x-sidebar>
