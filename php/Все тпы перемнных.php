<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
 <title>Test Form PHP.SU</title>
 </head>
 <body>
 <h3>�������� �����_1</h3>
 <form name="form1" method="post" action="script1.php">
 <p><span>��������� ����: </span>
 <input type="text" name="textfield">
 </p>
 <p>���� ����� ������: 
 <input type="text" name="pswfield">
 </p>
 <p>������� ���� hidden 
 <input name="hidden" type="hidden" id="hidden" value="�������_��������">
 </p>
 <hr size="1">
 <p>����������� ������������� (checkbox):</p>
 <p>
 <input type="checkbox" name="checkbox1" value="1">
������� ������
<input type="checkbox" name="checkbox2" value="1">
������� ������
<input type="checkbox" name="checkbox3" value="1" checked>
������� ������ (�� ���������)</p>
 <hr size="1">
 <p>��������� ������������� (radio):</p>
 <p>
 <input name="radiobutton" type="radio" value="yes"> 
�� 
<input name="radiobutton" type="radio" value="no"> 
���</p>
 <hr size="1">
 <p>������������� ��������� ���� (textarea):</p>
 <p>
 <textarea name="textarea" cols="40" rows="10">����� �� ���������</textarea> 
 </p>
 <hr size="1">
 <p>������ � ������������ �������:</p>
 <p>
 <select name=day_s size=1>
 <option value=1>�����������</option>
 <option value=2>�������</option>
 <option value=3 selected>�����</option>
 <option value=4>�������</option>
 <option value=5>�������</option>
 <option value=6>�������</option>
 <option value=7>�����������</option>
 </select>
 </p>
 <p>������ � ������������� ������� (multiple):</p>
 <p>
 <select name=day_m[] size=7 multiple>
 <option value=1 selected>�����������</option>
 <option value=2>�������</option>
 <option value=3>�����</option>
 <option value=4>�������</option>
 <option value=5>�������</option>
 <option value=6>�������</option>
 <option value=7>�����������</option>
 </select> 
 </p>
 <hr size="1">
 <p>
 <input type="submit" value="�������� �����">
 &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="�������� �����">
 </p>
 <p>&copy;&nbsp;2005 <a href="http://php.su">PHP.SU</a></p>
 </form>
 </body>
 </html> 