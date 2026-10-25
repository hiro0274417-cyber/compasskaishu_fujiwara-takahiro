<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 bg-white rounded shadow p-3 mt-4 d-flex flex-column" style="min-height: 90vh;">
    <div class="pt-4"></div>
    {!! $calendar->render() !!}
    <div class="adjust-table-btn mt-auto mx-auto text-right pt-3" style="width: 95%;">
      <input type="submit" class="btn btn-primary btn-sm" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
</div>
</x-sidebar>
