<x-sidebar>
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- キャンセル確認モーダル -->
<div id="cancelReserveModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:white; padding:25px; border-radius:8px; width:90%; max-width:400px;">
        <h5>予約キャンセル確認</h5>

        <p>予約日：<span id="cancelReserveDate"></span></p>
        <p>予約時間：<span id="cancelReservePart"></span></p>

        <div class="text-right">
            <button type="button" id="closeCancelModal" class="btn btn-secondary">
                閉じる
            </button>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('cancelReserveModal');
    const reserveDate = document.getElementById('cancelReserveDate');
    const reservePart = document.getElementById('cancelReservePart');
    const closeButton = document.getElementById('closeCancelModal');

    document.querySelectorAll('.cancel-reserve-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            reserveDate.textContent = button.dataset.reserveDate;
            reservePart.textContent = button.dataset.reservePart;
            modal.style.display = 'flex';
        });
    });

    closeButton.addEventListener('click', function () {
        modal.style.display = 'none';
    });
});
</script>
</x-sidebar>
