<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Data Pasien</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>

<body>
  <h1>Surat Rujukan</h1>
  <table>
    <tr>
      <th>Kode Rujukan</th>
      <td>{{ $data->kode_rujukan }}</td>
    </tr>
    <tr>
      <th>Kode Rekam Medis</th>
      <td>{{ $data->kode_rekammedis }}</td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>{{ $data->rekamMedis->dataAntrian->User->name }}</td>
    </tr>
    <tr>
      <th>NIK</th>
      <td>{{ $data->rekamMedis->dataAntrian->User->NIK }}</td>
    </tr>
    <tr>
      <th>BPJS</th>
      <td>{{ $data->rekamMedis->dataAntrian->User->bpjs }}</td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>{{ $data->rekamMedis->dataAntrian->User->alamat }}</td>
    </tr>
    <tr>
      <th>Fasilitas</th>
      <td>{{ $data->fasilitas }}</td>
    </tr>
    <tr>
      <th>Rencana Tindak Lanjut</th>
      <td>{{ $data->rencana_tindak_lanjut }}</td>
    </tr>
    <tr>
      <th>Created At</th>
      <td>{{ \Carbon\Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}</td>
    </tr>
  </table>
</body>

</html>
