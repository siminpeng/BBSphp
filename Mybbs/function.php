<?php
function unhtml($content) 
{
	$content=htmlspecialchars($content);//转换特殊字符为html字符
	$content=str_replace("@","", $content);//替换换行符
	return trim($content);
}

function msubstr($str,$start,$len)
{
	$strlen=$start+$len;
	$tempstr="";
	for ($i = 0; $i < $strlen; $i++) 
	{
		if(ord(substr($str,$i,1))>0xa0)//如果取出的是汉字
		{
			$tempstr.=substr($str,$i,2);//一次取两个字符
			$i++;
		}
		else
		{
			$tempstr.=substr($str, $i,1);//一次取一个字符
		}
	}
	return $tempstr;
}

//echo unhtml("jfiergu<br>	");
//echo msubstr("dfjiergh汉资", 0, 15);