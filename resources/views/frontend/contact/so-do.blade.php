<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mail</title>
</head>
<body>
<table align="center" border="1" cellpadding="15" cellspacing="0" width="600px" bgcolor="#dcf0f8" style="margin:0;padding:0;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#444;line-height:18px">
  <tbody>  
      <tr>
        <th colspan="2">THÔNG TIN KHÁCH HÀNG</th>
      </tr>  
      <tr>
        <td width="200px" class="tieu-de">Họ tên</td>
        <td class="gia-tri">{{ $dataArr->full_name }}</td>
      </tr>
      <tr>
        <td width="200px" class="tieu-de">Điện thoại</td>
        <td class="gia-tri">{{ $dataArr->phone }}</td>
      </tr>
      <tr>
        <td width="200px" class="tieu-de">Email</td>
        <td class="gia-tri">{{ $dataArr->email }}</td>
      </tr>     
      <tr>
        <td width="200px" class="tieu-de">Ghi chú</td>
        <td class="gia-tri">{{ $dataArr->notes }}</td>
      </tr>
  </tbody>
</table>
<h3>SỐ ĐO</h3>
<table align="center" border="1" cellpadding="15" cellspacing="0" width="300px" bgcolor="#dcf0f8" style="margin:0;padding:0;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#444;line-height:18px">
  <tbody> 
      <tr>
        <th colspan="2">THÔNG TIN SỐ ĐO</th>
      </tr>   
      <tr>
        <td width="150px" class="tieu-de">Vòng ngực</td>
        <td class="gia-tri">{{ $dataArr->vong_nguc }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Vòng eo</td>
        <td class="gia-tri">{{ $dataArr->vong_eo }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Vòng mông</td>
        <td class="gia-tri">{{ $dataArr->vong_mong }}</td>
      </tr>     
      <tr>
        <td width="150px" class="tieu-de">Hạ ngực</td>
        <td class="gia-tri">{{ $dataArr->ha_nguc }}</td>
      </tr>

      <tr>
        <td width="150px" class="tieu-de">Chéo ngực</td>
        <td class="gia-tri">{{ $dataArr->cheo_nguc }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Hạ eo sau</td>
        <td class="gia-tri">{{ $dataArr->ha_eo_sau }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Rộng vai</td>
        <td class="gia-tri">{{ $dataArr->rong_vai }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Vòng nách</td>
        <td class="gia-tri">{{ $dataArr->vong_nach }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Vòng cổ</td>
        <td class="gia-tri">{{ $dataArr->vong_co }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Dài tay</td>
        <td class="gia-tri">{{ $dataArr->dai_tay }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Dài RAGLAN</td>
        <td class="gia-tri">{{ $dataArr->dai_raglan }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Bắp tay</td>
        <td class="gia-tri">{{ $dataArr->bap_tay }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Cổ tay</td>
        <td class="gia-tri">{{ $dataArr->co_tay }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Dài áo</td>
        <td class="gia-tri">{{ $dataArr->dai_ao }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Dài quần + giày</td>
        <td class="gia-tri">{{ $dataArr->dai_quan_giay }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Chiều cao</td>
        <td class="gia-tri">{{ $dataArr->chieu_cao }}</td>
      </tr>
      <tr>
        <td width="150px" class="tieu-de">Cân nặng</td>
        <td class="gia-tri">{{ $dataArr->can_nang }}</td>
      </tr>
  </tbody>
</table>
<style type="text/css">
  td.tieu-de{
    background-color: #CCC
  }
  td.gia-tri{
    font-size:17px;
    font-weight: bold;
  }
</style>
</body>
</html>