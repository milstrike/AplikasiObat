<html>
<head>
<style type="text/css" media="print">
	.printButtonClass{ display : none }
</style>
</head>
<body>
<small><button onclick="window.print();" class="printButtonClass">Cetak Label</button></small><br/><br/>
	<table width="200px" border="1" cellpadding="1" cellspacing="1">
		<tr>
			<td colspan="2" style="text-align: center; font-size: 10px;">PUSKESMAS UMBULHARJO II<br/>YOGYAKARTA</td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 10px;"><strong>Nama Pasien</strong></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right; font-size: 10px;">{{ $namapasien->first()->nama }}</td>
		</tr>
		<tr>
			<td style="font-size: 10px;"><strong>Nama Obat<strong></td>
			<td style="text-align: right; font-size: 10px;">{{ $dataresep->first()-> nama_obat}}</td>
		</tr>
		<tr>
			<td style="font-size: 10px;"><strong>Aturan Minum</strong></td>
			<td style="text-align: right; font-size: 10px;">{{ $dataresep->first()->keterangan}}</td>
		</tr>
		<tr>
			<td style="font-size: 10px;"><strong>Dokter</strong></td>
			<td style="text-align: right; font-size: 10px;">{{ $dataresep->first()->dokter }}</td>
		</tr>
	</table>
</body>
</html>