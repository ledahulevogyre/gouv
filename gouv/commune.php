<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=windows-1252" />
<title>Quelles coalitions possibles ?</title>
<style>
body {
  font-family : Helvetica, Geneva, Arial, SunSans-Regular, sans-serif;
}
table  {
  border-collapse: collapse;
}
table,th, td {
  border: 1px solid black;
}
#tabProg td {
  border: 0px solid black;
}

h3 {text-align:center}
.centerTable {
  margin-left:auto;
  margin-right:auto;
  border:0px;
}
.numcell {
  text-align: right;
}
#coaTab {
  margin:10px;
}
#tabProg {
  font-size:9pt;
}
footer {
  font-size:.7em;
  display:block;
  text-align:right;
}
.bortop, #tabProg tr:first-child > th, #tabProg tr:first-child > td {
  border-top-width: 2px;
}
#tabProg th.first, #tabProg td.first, #tabProg tr > th:first-child, #tabProg tr > td:first-child {
  border-left-width: 2px;
}
#tabProg tr > th:last-child, #tabProg tr > td:last-child {
  border-right-width: 2px;
}
#tabProg tr:first-child > th, #tabProg tr:nth-child(2) > th, #tabProg tr:last-child > th, #tabProg tr:last-child > td {
  border-bottom-width: 2px;
}
</style>
<link rel="stylesheet" href="tabber.css" TYPE="text/css" MEDIA="screen">
<script src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="tabber-minimized.js"></script>
<script>
  var color = {
    "CD&V N-VA":"#F89734",
    "N-VA":"#FCB340",
    "CD&V":"#F89734",
    "sp.a":"#FF0B14",
    "sp.a-spirit":"#FF0B14",
    "Open Vld":"#4997D5",
    "VB":"#FFCC33",
    "VLAAMS BELANG":"#FFCC33",
    "GROEN!":"#A3C02A",
    "LDd":"#5FC6EF",
    "PS":"#EE3439",
    "ps":"#EE3439",
    "P.S.":"#EE3439",
    "PS-sp.a":"#EE3439",
    "PS - sp.a":"#EE3439",
    "MR":"#154F99",
    "M.R.":"#154F99",
    "FDF":"#CD1898",
    "CDh":"#FF5400",
    "cdH":"#FF5400",
    "CDH+":"#FF5400",
    "CDH":"#FF5400",
    "CDH-CD&V":"#FF5400",
    "ecolo":"#C1E331",
    "ECOLO":"#C1E331",
    "Ecolo":"#C1E331",
    "Ecolo-Groen":"#C1E331",
    "ECOLO-GROEN":"#C1E331",
    "ECOLO - GROEN":"#C1E331",
    "PP":"#CCCCCC",
    "FN":"#CCCCCC",
    "VLD":"#4997D5",
    "CVP":"#F89734",
    "SP":"#FF0B14",
    "AGALEV":"#A3C02A",
    "PSC":"#FF5400",
    "VU":"#FCB340"
  };
<?php

$walId = $_GET['walId'];
$bxlId = $_GET['bxlId'];
$vlaId = $_GET['vlaId'];
$leg = $_GET['leg'];

?>

</script>
<script>
  <?php if ($vlaId) { ?>
  var vlaId = <?php echo $vlaId; ?>;
  var vlaRes=<?php
include 'http://www.vlaanderenkiest.be/verkiezingen2012/2012/gemeente/'.$vlaId.'/entiteitUitslag.json';
?>;
  var vlaLists=<?php
include 'http://www.vlaanderenkiest.be/verkiezingen2012/2012/gemeente/'.$vlaId.'/entiteitLijsten.json';
?>;
  data = {"sieges": {}, progrInit : {}};
for (var part in vlaRes.G[vlaId].us) {
  //alert(vlaLists.G[part].nm);
  //alert(vlaRes.G[vlaId].us[part].zs);
  if (vlaRes.G[vlaId].us[part].zs>0) {
    data.sieges[vlaLists.G[part].nm] = vlaRes.G[vlaId].us[part].zs;
    data.progrInit[vlaLists.G[part].nm] = { "require":[], "reject":[] };
    color[vlaLists.G[part].nm] = vlaLists.G[part].kl;
  }
}
  <?php 
  } else if ($walId) { ?>
  var walId = '<?php echo $walId; ?>';
  data = {"sieges": {
<?php
 $html = file_get_contents('http://elections2012.wallonie.be/results/fr/com/results/results_tab_'.$walId.'.html');
 $DOM = new DOMDocument;
 $DOM->loadHTML($html);
 $items = $DOM->getElementsByTagName('tr');
 for ($i = 0; $i < $items->length; $i++) {
   $tr = $items->item($i);
   if ($tr->getAttribute('class')=='tdcatbg03') {
     $first = $tr;
     break;
   }
 }
 //echo $first->getNodePath();
 $first = $first->parentNode->getElementsByTagName('tr')->item(2);
 $tr = $first;
 while($tr) {
   if ($tr->nodeName=='tr') {
     $nl = $tr->getElementsByTagName('td');
     $strSiege = $nl->item(17)->firstChild->textContent;
     $strSiege = strstr($strSiege, '(', true);
     if ($strSiege!='' && $strSiege!='0')
       echo '"'.$nl->item(3)->textContent.'" : '.$strSiege.',';
   }

   $tr = $tr->nextSibling;
 }

?>
}, progrInit : {<?php
 $tr = $first;
 while($tr) {
   if ($tr->nodeName=='tr') {
     $nl = $tr->getElementsByTagName('td');
     $strSiege = $nl->item(17)->firstChild->textContent;
     $strSiege = strstr($strSiege, '(', true);
     if ($strSiege!='' && $strSiege!='0')
       echo '"'.$nl->item(3)->textContent.'" : { "require":[], "reject":[] },';
   }

   $tr = $tr->nextSibling;
 }

?>}};

  <?php
  } else { ?>
  var bxlId = '<?php echo $bxlId; ?>';
  data = {"sieges": {
<?php
 $html = file_get_contents('http://bru2012.irisnet.be/fr/com/results/results_tab_'.$bxlId.'.html');
 $DOM = new DOMDocument;
 $DOM->loadHTML($html);
 $items = $DOM->getElementsByTagName('tr');
 for ($i = 0; $i < $items->length; $i++) {
   $tr = $items->item($i);
   echo $tr->getAttribute('class').' ';
   if ($tr->getAttribute('class')=='tdcatbg03') {
     $first = $tr;
     break;
   }
 }
 $first = $first->parentNode->getElementsByTagName('tr')->item(2);
 $tr = $first;
 while($tr) {
   if ($tr->nodeName=='tr') {
     $nl = $tr->getElementsByTagName('td');
     $strSiege = $nl->item(17)->firstChild->textContent;
     $strSiege = strstr($strSiege, '(', true);
     if ($strSiege!='' && $strSiege!='0')
       echo '"'.$nl->item(3)->textContent.'" : '.$strSiege.',';
   }

   $tr = $tr->nextSibling;
 }

?>
}, progrInit : {<?php
 $tr = $first;
 while($tr) {
   if ($tr->nodeName=='tr') {
     $nl = $tr->getElementsByTagName('td');
     $strSiege = $nl->item(17)->firstChild->textContent;
     $strSiege = strstr($strSiege, '(', true);
     if ($strSiege!='' && $strSiege!='0')
       echo '"'.$nl->item(3)->textContent.'" : { "require":[], "reject":[] },';
   }

   $tr = $tr->nextSibling;
 }
?>}};
    
  <?php } ?>
  
</script>

</head>
<body>
  <a href="gemeente.php">Flandre</a>&bull;
  <a href="communes-bruxelles.php">Communes bruxelloises</a>&bull;
  <a href="communes-wallonie.php">Communes wallonnes</a>&bull;
  <a href="provinces.php">Provinces Wallonnes</a>
  <h3>Toi aussi, forme ton Conseil Communal</h3>
  <?php
  if ($walId || $bxlId) {
    $io = strpos($html, '<!-- ####   ENTITEPAGE   #### -->');
    $io2 = strpos($html, '<!-- ####   END ENTITEPAGE   #### -->');
    echo '<h3>'.substr($html, $io+33, $io2-$io-33).'</h3>';
  }
  ?>

<div class="tabber" id="tabber">

     <div class="tabbertab">
	  <h2>Tester une coalition</h2>
  <div><br>Sélectionnez les partis de votre coalition, et voyez si c'est mathématiquement possible.</div>
  <table class="centerTable"><tr><td style="border:0px;vertical-align:top;"><table id="tab"></table></td>
  </tr></table>
  
  <br/>
  <table class="centerTable" style="border:0px;"><tr><td style="border:0px;"><table id="result">
  <tr id="majTR" style="background:#FFBBBB" title="Nécessaire à la formation d'un gouvernement"><th>Majorité ordinaire</th><td><input id="maj" type="checkbox" onclick="majWarningColors()"/></td></tr>
  <tr title="Inclut le parti ayant la majorité relative."><td>Inclut le parti majoritaire</td><td id="bigfishTR"><input id="bigfish" type="checkbox"/></td></tr>
  </table></td><td style="border:0px;vertical-align:top;">
  <table id="countSeats">
  <tr><th rowspan="2">Sièges</th><th colspan="2">Conseil</th></tr>
  <tr><th>confiants</th><th>dispo.</th></tr>
  <tr><th>Total</th><td id="nbTot" class='numcell'></td><td id="nbTotAv" class='numcell'></td></tr>
    <tr><th>Nombre de partis</th><td colspan="4" id="nbParts" class='numcell'></td></tr>
  </table></td></table>
     </div>


     <div class="tabbertab tabbertabdefault">
	  <h2>Voir toutes les coalitions possibles</h2>
  <div><br>Sélectionnez les critères que vous souhaitez voir respectés, et affichez toutes les coalitions possibles en cliquant sur le bouton ci-dessous</div>
  <br/><input type="button" value="Réinitialiser" onclick="critInit()" title="Réeinitaliser avec les critères que je considère comme les plus propables"/><br/>
  <label><input type="checkbox" id="checkBigFish" onclick="critBigFish(checked)"/>Inclure le parti majoritaire</label><br/>
  <table id="tabProg"></table>
  <br/>
  <div style="text-align:center">
  <input type="button" value="Afficher les exécutifs possibles selon ces critères" onclick="possible()"/>
  </div>
  <br><br><table id="crit"><tr><td>Les possiblités vont s'afficher ci-dessous</td></tr></table><br>  
  <label title="Cache les coalitions qui seraient l'extension d'une qu'on a déjà dans la liste, et qui inclut donc des partis non nécessaires"><span>Cacher les coalitions redondantes</span><input id="hideRedun" type="checkbox" checked="true" onclick="showHideRedun()"/></label>
  <table id="possible"></table>
     </div>


</div>

  
  <br><br><footer><a href="mailto:leunen.d@gmail.com">contact</a></footer>
<script>



  var green = "#BBFFBB";
  var yellow = "#EEFFAA";
  var red = "#FFBBBB";
  var orange = "#FFDDBB";
  var lightgreen = "#CCFFBB";
  var lightorange = "#FFEEBB";
  
  var progr;

  function loadTab() {
    
    
    progr = jQuery.extend(true, {}, data.progrInit);
    
    var tab = $("#tab").empty();
    tab.append("<tr><th>Partis</th><th>Conseil</th></tr>");
    for (var part in data.sieges) {
      tab.append($("<tr/>").append($("<td/>").append($("<label/>").text(part).prepend($("<input type='checkbox' onclick='change()'/>").attr("value", part)))).append("<td class='numcell'>"+data.sieges[part]+"</td>"));
    }
    inputs = $("#tab input");
    
    
    //critères
    var tab = $("#tabProg").empty();
    tab.append("<tr><th rowspan='2'>Parti</th><th class='first' colspan='"+inputs.length+"'>Requiert la présence de</th><th class='first' colspan='"+inputs.length+"'>Refuse de négocier avec</th></tr>");
    var row = $("<tr/>");
    var first = true;
    for (var part in data.sieges) {
      var cell = $("<th class='verti' style='background-color:"+(color[part]?color[part]:"none")+"'/>").html(part.replace(/(.)/g,"$1<br />"));
      if (first)
        cell.addClass("first");
      row.append(cell);
      first = false;
    }
    first = true;
    for (var part in data.sieges) {
      var cell = $("<th class='verti' style='background-color:"+(color[part]?color[part]:"none")+"'/>").html(part.replace(/(.)/g,"$1<br />"));
      if (first)
        cell.addClass("first");
      row.append(cell);
      first = false;
    }
    tab.append(row);
    for (var part in data.sieges) {
      row = $("<tr/>");
      row.attr("data-part", part);
      row.append($("<th style='background-color:"+(color[part]?color[part]:"none")+"'/>").text(part));
      first = true;
      for (var withPart in data.sieges) {
        var cell = $("<td>");
        if (part!=withPart)
          cell.append($("<input type='checkbox' onclick='critChanged(this)'/>").attr("data-crit", "require").attr("data-withPart", withPart));
        if (first)
          cell.addClass("first");
        row.append(cell);
        first = false;
      }
      first = true;
      for (var withPart in data.sieges) {
        var cell = $("<td>");
        if (part!=withPart)
          cell.append($("<input type='checkbox' onclick='critChanged(this)'/>").attr("data-crit", "reject").attr("data-withPart", withPart));
        if (first)
          cell.addClass("first");
        row.append(cell);
        first = false;
      }
      tab.append(row);
    }
    row = $("<tr id='allsel'/>");
    row.append($("<th class='bortop'><small>Tout sélectionner</small></td>"));
    first = true;
    for (var withPart in data.sieges) {
      var cell = $("<td class='bortop'/>").append($("<input type='checkbox' onclick='allSelChanged(this)'/>").attr("data-crit", "require-"+withPart));
      if (first)
        cell.addClass("first");
      row.append(cell);
      first = false;
    }
    first = true;
    for (var withPart in data.sieges) {
      var cell = $("<td class='bortop'/>").append($("<input type='checkbox' onclick='allSelChanged(this)'/>").attr("data-crit", "reject-"+withPart));
      if (first)
        cell.addClass("first");
      row.append(cell);
      first = false;
    }
    tab.append(row);

    critBigFish(true);

    var crit = $("#crit").empty();
    crit.append("<tr><td>Les possiblités vont s'afficher ci-dessous</td></tr>");

    $("#possible").empty();
    computeCurrent();
    showComputed();

    hashChanged();
  }

  function critBigFish(checked) {
    var maxi = 0;
    for(var part in data.sieges) {
      var ch = data.sieges[part];
      if(ch>maxi)
        maxi = ch;
    }
    for(var withPart in data.sieges) {
      if (data.sieges[withPart]>=maxi) {
        for(var part in progr) {
          if (part!=withPart) {
            var require = progr[part]["require"];
            var index = $.inArray(withPart, require);
            if(checked) {
              if (index==-1)
                require.push(withPart);
            } else {
              if (index!=-1)
                require.splice(index, 1);
            }
          }
        }
      }
    }
    
    critUpdate();
  }

  function critUpdate() {
    // tableau
    var rows = $("#tabProg tr[data-part]");
    var critMissing = {};
    for(var i=0; i<rows.length ;i++) {
      var part = rows[i].getAttribute("data-part");
      var cells = $(rows[i]).find("input[data-crit]");
      for(var j=0; j<cells.length ;j++) {
        var crit = cells[j].getAttribute("data-crit");
        //alert(part+" "+crit);
        if (crit=="require" || crit=="reject") {
          var withPart = cells[j].getAttribute("data-withPart");
          var checked = $.inArray(withPart, progr[part][crit])!=-1;
          cells[j].checked = checked;
          if (!checked)
            critMissing[crit+"-"+withPart] = true;
        } else {
          var checked = progr[part][crit];
          cells[j].checked = checked;
          if (!checked)
            critMissing[crit] = true;
        }
      }
    }
    // "tout sélectionné"
    var cells = $("#allsel").find("input");
    for(var i=0; i<cells.length ;i++) {
      var crit = cells[i].getAttribute("data-crit");
      cells[i].checked = !critMissing[crit];
    }
    // critères
    $("#checkBigFish")[0].checked = isBigFish();
  }

  function change() {
    var ret = computeCurrent();
    showComputed();
    majWarningColors();
  }
  var tot, coa, max, maj, pbigfishResp,countPart;
  function computeCurrent() {
    tot = 0;
    coa = 0;
    max = 0;
    var parts = {};
    for(var i=0; i<inputs.length ;i++) {
      var input = inputs[i];
      var part = input.value;
      var ch = data.sieges[part];
      tot += ch;
      if(ch>max)
        max = ch;
      if (input.checked) {
        parts[part] = true;
        coa += ch;
      }
    }
    maj = coa>tot/2;
    pbigfishResp = true;
    for(var part in data.sieges) {
      if (!(part in parts)) {
        if (data.sieges[part]>=max) {
          pbigfishResp = false;
          break;
        }
      }
    }
    countPart = 0;
    for(var part in parts)
      countPart++;

    return [parts,coa];
  }

  function showComputed() {
    for(var i=0; i<inputs.length ;i++) {
      var input = inputs[i];
      var row = $(input).parent().parent();
      if (input.checked)
        row.css("background", (color[input.value]?color[input.value]:"none"));
      else
        row.css("background", "none");
    }

    $("#nbTot").text(coa);
    $("#nbTotAv").text(tot);
    $("#nbParts").text(countPart);
    
    $("#maj")[0].checked = maj;
    $("#bigfish")[0].checked = pbigfishResp;
  }

  function majWarningColors() {
    if ($("#maj")[0].checked)
      $("#majTR").attr("style", "background:"+green);
    else
      $("#majTR").attr("style", "background:"+red);

    $("#bigfishTR").attr("style", "background:"+($("#bigfish")[0].checked?lightgreen:lightorange));

      

    if ($("#nbTot").text()>$("#nbTotAv").text()/2) {
      $("#nbTot").attr("style", "background:"+green);
    } else
      $("#nbTot").attr("style", "background:"+red);

  }



// voir toutes les coalitions possibles  

  function critInit() {
    progr = jQuery.extend(true, {}, progrInit);
    // en plus des programmes des partis, on rajoute les partis gagnants (c'est souvent comme ça)
    if (currentLeg.critBigFish)
      critBigFish(true);
    
    $("#hideRedun")[0].checked = currentLeg.hideRedun;
    showHideRedun();
  }  


  var possibs = {};
  
  function possible() {
    var crit = $("#crit").empty();
    crit.append("<tr><th>Ci-dessous les possibilités pour vos critères</th></tr>");
    crit.append("<tr><td><small>Ces possiblités ne sont que mathématiques.<br/>Les négociations politiques peuvent bien évidemment réduire cette liste</small></td></tr>");
    
    $("#possible").empty();
    var s = "<tr><th>Coalition</th>";
    for(var part in data.sieges)
      s += "<th style='background:"+(color[part]?color[part]:"none")+"'>"+part+"</th>";
    $("#possible").append(s+"<th>Sièges</th><th>Partis</th><th></th></tr>");

    $('input[type=radio][name=coa]').attr('checked', false);
    for(var i=0; i<inputs.length ;i++)
      inputs[i].checked = false;
    possibs = {};
    testWith(1);
    $('input[type=radio][name=coa]').attr('checked', false);
    for(var i=0; i<inputs.length ;i++)
      inputs[i].checked = false;
    $("#countSeats td").text("");
    majWarningColors();
    
    s = "<tr><th>Coalition</th>";
    for(var part in data.sieges)
      s += "<th style='background:"+(color[part]?color[part]:"none")+"'>"+part+"</th>";
    $("#possible").append(s+"<th>Sièges</th><th>Partis</th><th></th></tr>");
    computeCurrent();
    showComputed();
    showHideRedun();
  }

  function testWith(nb) {
    var res = {};
    addPart(nb, res);
    
    // prendre d'abord ceux qui ont le moins de sièges pour trouver les petites coalitions en premier
    var count = 0;
    for(var html in res)
      if(res[html])
        count++;
    while(count>0) {
      var added = {};
      var min = -1;
      for(var html in res) {
        var seat = res[html];
        if(seat && (min==-1 || min>seat))
          min = res[html];
      }
      for(var html in res) {
        if(min==res[html]) {
          $("#possible").append(html);
          added[html] = true;
        }
      }
      for(var html in added)
        res[html] = false;
      count = 0;
      for(var html in res)
        if(res[html])
          count++;
    }

    if (nb<inputs.length)
      testWith(nb+1);
  }

  function isBigFish() {
    var max = 0;
    for(var part in data.sieges) {
      var ch = data.sieges[part];
      if(ch>max)
        max = ch;
    }
    for(var withPart in data.sieges) {
      if (data.sieges[withPart]>=max) {
        for(var part in progr) {
          if (part!=withPart) {
            var require = progr[part]["require"];
            var index = $.inArray(withPart, require);
            if (index==-1)
              return false;
          }
        }
      }
    }
    return true;
  }
  window.onhashchange = hashChanged;
  function hashChanged() {
    if (location.hash.length!=0) {
      var tParts = location.hash.substring(1).split(",");

      for(var i=0; i<inputs.length ;i++) {
        //alert(($.inArray(inputs[i].value, tParts))+" "+location.hash);
        inputs[i].checked = $.inArray(inputs[i].value, tParts)!=-1;
      }
      change();
      $(".tabbertabdefault").removeClass("tabbertabdefault");
      $('#tabber')[0].tabber.tabShow(0);
      window.scrollTo(0,0);
    }
  }

  function addPart(nb, results) {
    if(nb==0) {
      var res = compute();
      if(res)
        results[res[0]] = res[1];
    }
    else {
      var start = -1;
      for(var i=0; i<inputs.length ;i++)
        if (inputs[i].checked)
           start = i;
      for(var i=start+1; i<inputs.length ;i++) {
        inputs[i].checked = true;
        addPart(nb-1, results);
        inputs[i].checked = false;
      }
    }
  }
  
  function compute() {
    var res = computeCurrent();
    if (!maj)
      return;
    var parts = res[0];
    
    // pour chacun des partis de cette coalition
    for(var part in parts) {
      // vérifier que ses critères sont respectés
      var crit = progr[part];
      var require = crit["require"];
      for(var i=0; i<require.length ;i++)
        if (!(require[i] in parts))
          return;
      var reject = crit["reject"];
      for(var i=0; i<reject.length ;i++)
        if (reject[i] in parts)
          return;
    }
    
      // si cette coalition est l'extension d'une qu'on a déjà, et qui a les caractéristiques de celle-ci, alors on passe celle-ci
      // pour ça, je transforme la combinaison en entier (tableau de bits), ainsi que les caractéristiques
      // et je stocke le tout dans un tableau associatif
      
      var redun = false;
      var combi = 0;
      for(var i=0; i<inputs.length ;i++) {
        var input = inputs[i];
        if (input.checked)
          combi += Math.pow(2,i);
      }
      var cara = (maj?1:0)+(pbigfishResp?2:0);
      
      for(var comb in possibs) {
        var com = parseInt(comb);
        if ((combi & com)==com) {
          var car = possibs[comb];
          if ((cara & car)==cara)
            redun = true;
        }
      }

      possibs[""+combi] = cara;

      var shtml = "";
      var count = 0;
      var partsHash = "";
      for(var part in data.sieges) {
        if (part in parts) {
          shtml += "<td style='background:"+(color[part]?color[part]:"none")+"'>"+part+"</td>";
          partsHash += ","+part;
          count++;
        } else
          shtml += "<td></td>";
      }
      
      var found = false;
      /*for (var i=0; i<coalitions.length ;i++) {
        var coalition = coalitions[i];
        found = true;
        for(var j=0; j<coalition.parts.length ;j++) {
          coaPart = coalition.parts[j];
          if (!(coaPart in parts) && coaPart in data.sieges) {
            found = false;
            break;
          }
        }
        if (found) {
          var plus = "";
          var countPlus = 0;
          for(var part in parts) {
            if ($.inArray(part, coalition.parts) == -1) {
              plus += " + "+part;
              countPlus++;
              if (countPlus>2) {
                found = false
                break;
              }
            }
          }
          if (found) {
            shtml = "<td>"+coalition.name+plus+"</td>"+shtml;
            break;
          }
        } 
      }*/
      if (!found)
        shtml = "<td>Inconnue</td>"+shtml;
      shtml += "<td class='numcell'>"+res[1]+"</td><td class='numcell'>"+count+"</td><td><a href='#"+partsHash.substring(1)+"'>voir</a></td>";
      
      return ["<tr"+(redun?" class='redun'":"")+">"+shtml+"</tr>",res[1]];
  } 

  function showHideRedun() {
    //$(".redun").css("visibility", $("#hideRedun")[0].checked?"collapse":"visible");
    $(".redun").css("display", $("#hideRedun")[0].checked?"none":"table-row");
  }

  function critChanged(target) {
    var part = target.parentNode.parentNode.getAttribute("data-part");
    var crit = target.getAttribute("data-crit");
    if (crit=="require" || crit=="reject") {
      var withPart = target.getAttribute("data-withPart");
      var index = $.inArray(withPart, progr[part][crit]);
      if (target.checked && index==-1)
        progr[part][crit].push(withPart);
      else if (!target.checked && index!=-1)
        progr[part][crit].splice(index, 1);
    } else
      progr[part][crit] = target.checked;
    critUpdate();
  }
  
  function allSelChanged(target) {
    var crit = target.getAttribute("data-crit");
    var io = crit.indexOf("-");
    if (io==-1) {
      for(var part in progr)
        progr[part][crit] = target.checked;
    } else {
      var withPart = crit.substring(io+1);
      crit = crit.substring(0, io);
      for(var part in progr) {
        var index = $.inArray(withPart, progr[part][crit]);
        if (target.checked && index==-1)
          progr[part][crit].push(withPart);
        else if (!target.checked && index!=-1)
          progr[part][crit].splice(index, 1);
      }
    }
    critUpdate();
  }  
  
  loadTab();
</script>
</body>
</html>