<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 bg-white rounded shadow p-4 mt-5">
    {!! $calendar->render() !!}
    <div class="adjust-table-btn m-auto text-right pt-3" style="width: 95%;">
      <input type="submit" class="btn btn-primary btn-sm" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
</div>
</x-sidebar>
