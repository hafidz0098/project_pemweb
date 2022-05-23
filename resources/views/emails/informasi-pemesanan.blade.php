<div>
  <div></div>
</div>
<style>@media screen {
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');
      table,
      td,
      div,
      h1,
      p {
          font-family: 'Roboto', sans-serif;
      }
        }</style>
<div>
  <div class="email__container" style="background: #F3F7F9; padding-top: 30px; padding-bottom: 50px;">
    <div class="email__content" style="max-width: 640px; margin: 0 auto;">
      <div class="email__content-header" style="height: 128px; border-radius: 8px 8px 0 0; background: url(''), linear-gradient(180deg, #143F6B 0%, #143F6B 100%);">
        <h1 style="font-size: 24px; color: white; margin: 0; padding: 50px 0; text-align: center;">INFORMASI PEMESANAN</h1>
      </div>
      <div class="email__content-body" style="border-radius: 0 0 8px 8px; background: white; padding: 20px 20px;">
        <p style="margin: 0  0 16px;">Halo {{ $data->name }}, 
          <br>
          <br>Kamu baru saja melakukan permintaan pemesanan paket wisata:
        </p>
        <div class="section" style="margin-bottom: 24px;">
          <div class="section__title" style="font-size: 16px; font-weight: bold;">Detail Pemesanan</div>
          <hr style="border: none; height: 1px; background: #dedede; margin: 8px 0;">
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Nama</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">{{ $data->name }}</div>
          </div>
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Email</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">{{ $data->email }}</div>
          </div>
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Nomor Whatsapp</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">{{ $data->nomor_wa }}</div>
          </div>
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 200px;">Paket Wisata</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 205px); text-align: right;">{{ $data->layanan->name }}</div>
          </div>
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 200px;">Jumlah</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 205px); text-align: right;">{{ $data->jumlah }} x @currency($data->layanan->harga)</div>
          </div>
          <div class="section__content__detail" style="margin-bottom: 10px;">
            <div class="text--gray" style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Total Bayar</div>
            <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">@currency($data->total_bayar)</div>
          </div>
          <div style="margin: 16px 0;">
            <p style="margin: 16px 0;">Silahkan lakukan transfer ke rekening Tanjung Bira melalui ATM/internet/mobile banking tepat dengan nominal berikut:</p>
          </div>
          <div style="background: #F9F9F9; border-radius: 8px; padding: 6px 0;">
            <div style="margin: 6px 16px 16px 16px;">
              <div style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Nominal</div>
              <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">@currency($data->total_bayar)</div>
            </div>
            <hr style="border: none; height: 1px; background: #dedede; margin: 8px 0;">
            <div style="margin: 16px 16px 8px 16px;">
              <div style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Transfer ke Bank</div>
              <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">BCA</div>
            </div>
            <div style="margin: 0px 16px 8px 16px;">
              <div style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Nomor Rekening</div>
              <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">456322262</div>
            </div>
            <div style="margin: 0px 16px 8px 16px;">
              <div style="color: #333333; display: inline-block; vertical-align: top; width: 175px;">Atas Nama</div>
              <div class="text--bold" style="font-weight: bold; display: inline-block; vertical-align: top; width: calc(100% - 180px); text-align: right;">PT Tanjung Bira</div>
            </div>
          </div>
          <hr style="border: none; height: 1px; background: #dedede; margin: 8px 0;">
          <div style="margin: 16px 0;">
            <p class="text--small" style="font-size: 12px;">Kami akan mengirimkan notifikasi melalui email setelah transaksi selesai diproses. 
            </p>
          </div>
        </div>
      </div>
      <div class="email__content-footer" style="padding-top: 28px; text-align: center;">
        <hr style="margin: 28px auto; width: 106px;">
        <p class="text--small text--gray" style="font-size: 12px; color: #a9a9a9;">Copyright ⓒ 2022 PT. Tanjung Bira. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</div>