<?

/* MusicTicker - XML version 1.1.0                           */
/* MAD props to Tom Pepper and Tag Loomis for all their help */
/* Finalized base source:                                    */
/* May 07 2002 22:10 EST                                     */

/* SCXML object class 0.2.2 */

class SCXML {

/* DO NOT CHANGE ANYTHING FROM THIS POINT ON - THIS MEANS YOU !!! */

  var $depth = 0;
  var $lastelem= array();
  var $xmlelem = array();
  var $xmldata = array();
  var $stackloc = 0;

  var $parser;

  function set_password($password) {
    $this->password=$password;
  }

  function set_host($host) {
    $this->host=$host;
  }

  function set_port($port) {
    $this->port=$port;
  }

  function startElement($parser, $name, $attrs) {
    $this->stackloc++;
    $this->lastelem[$this->stackloc]=$name;
    $this->depth++;
  }

  function endElement($parser, $name) {
    unset($this->lastelem[$this->stackloc]);
    $this->stackloc--;
  }

  function characterData($parser, $data) {
    $data=trim($data);
    if ($data) {
      $this->xmlelem[$this->depth]=$this->lastelem[$this->stackloc];
      $this->xmldata[$this->depth].=$data;
    }
  }

  function retrieveXML() {
    $rval=1;

    $sp=@fsockopen($this->host,$this->port,&$errno,&$errstr,10);
//    if (!$sp) $rval=0;

      if( !$sp ) { return 0; $rval=0; }

    else {

      set_socket_blocking($sp,false);

      // send request

      fputs($sp,"GET /admin.cgi?pass=$this->password&mode=viewxml HTTP/1.1\nUser-Agent:Mozilla\n\n");

      // fetch response, timeout if it takes > 15s

      for($i=0; $i<30; $i++) {
    if(feof($sp)) break; // exit if connection broken
    $sp_data.=fread($sp,31337);
    usleep(500000);
      }

      // strip HTTP headers so all we have is XML data

      $sp_data=ereg_replace("^.*<!DOCTYPE","<!DOCTYPE",$sp_data);

      /* xml code goes here, here's a plain empty parser */

      $this->parser = xml_parser_create();
      xml_set_object($this->parser,&$this);
      xml_set_element_handler($this->parser, "startElement", "endElement");
      xml_set_character_data_handler($this->parser, "characterData");

      if (!xml_parse($this->parser, $sp_data, 1)) {
    $rval=-1;
      }

      xml_parser_free($this->parser);

    }
    return $rval;
  }

  function debugDump(){
    reset($this->xmlelem);
    while (list($key,$val) = each($this->xmlelem)) {
      echo "$key. $val -> ".$this->xmldata[$key]."\n";
    }

  }

  function fetchMatchingArray($tag){
    reset($this->xmlelem);
    $rval = array();
    while (list($key,$val) = each($this->xmlelem)) {
      if ($val==$tag) $rval[]=$this->xmldata[$key];
    }
    return $rval;
  }

  function fetchMatchingTag($tag){
    reset($this->xmlelem);
    $rval = "";
    while (list($key,$val) = each($this->xmlelem)) {
      if ($val==$tag) $rval=$this->xmldata[$key];
    }
    return $rval;
  }

}

function SongParse($info, $ans){

   list ($artist, $stitle) = split (' - ', $info);
   list ($last, $first) = split (', ', $artist); 

   $slash = strstr($last, '- ');

   if ($slash) {
   	list (,$last) = split ('- ', $last);
   }

   if($ans=="y"){
	if(!$stitle) {
	   return "$first $last";
	} else if(!$artist) {
	   return "$stitle";
	} else {
	   return "$first $last - $stitle";
	}
   } else {
	if(!$stitle) {
	   return "<b>$first $last</b>";
	} else if(!$artist) {
	   return "<B>$stitle</b>";
	} else {
	   return "$first $last - $stitle";
	   /* Was - return "<b>$first $last</b><br>$stitle"; */
	}
   }
}

?>
