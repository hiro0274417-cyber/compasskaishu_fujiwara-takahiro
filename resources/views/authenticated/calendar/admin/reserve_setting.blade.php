<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-100 vh-100 border">
    <div class="bg-white shadow-sm rounded w-75 mx-auto">
      <p class="text-center pt-3 mb-2">{{ $calendar->getTitle() }}</p>
    {!! $calendar->render() !!}
    <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
    </div>
  </div>
</div>
</x-sidebar>
