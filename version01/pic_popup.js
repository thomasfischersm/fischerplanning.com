function OpenNewWindow(WindowPicture,WindowParameters)
{
NewWindow=window.open("","NewOne", WindowParameters);
NewWindow.document.write ("<html><head><link href='fischercss.css' type=text/css rel=stylesheet>");
NewWindow.document.write ("<title>Shots</title></head>");
NewWindow.document.write ("<body topmargin='0' leftmargin='0' bgcolor='#E2E8F4'>");
NewWindow.document.write ("<div align='center'><img src=");
NewWindow.document.write (WindowPicture);
NewWindow.document.write (" vspace='5'><br><font class='MainText'><b><a href='javascript:window.close()'>Close Window</a></b></font><br>");
NewWindow.document.write ("</div></body></html>");
NewWindow.document.close();
return false;
}
