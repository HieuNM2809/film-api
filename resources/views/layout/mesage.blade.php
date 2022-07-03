  {{-- xuat loi --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
{{-- Thông báo kết quả --}}
@if (session('thongbao'))
  <div class="alert alert-success">
      {{ session('thongbao') }}
  </div>
@endif