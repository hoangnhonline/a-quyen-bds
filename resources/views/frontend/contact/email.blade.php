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
        <td width="200px" class="tieu-de">Hình thức</td>
        <td class="gia-tri">
          @if($dataArr->type == 1)
          Tư vấn dịch vụ
          @elseif($dataArr->type == 2)
          Yêu cầu báo giá
          @else
          Góp ý / Than phiền
          @endif
        </td>
      </tr>
      <?php 
      $imgArr = json_decode($dataArr->image_list, true);

      ?>
      @if(!empty($imgArr))
      <tr>
        <td colspan="2">
          @foreach($imgArr as $img)
          <img width="200" src="{{ Helper::showImage("/public/uploads/".$img) }}"/>
          @endforeach
        </td>
      </tr>
      @endif
      <tr>
        <td width="200px" class="tieu-de">Ghi chú</td>
        <td class="gia-tri">{{ $dataArr->content }}</td>
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