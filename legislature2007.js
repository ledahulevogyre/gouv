  var leg2007 = {
   chamb : {
    "CD&V":23, // difficile de savoir comment se répartissent cd&v et nva dont le cartel a explosé en cours de législature
    "MR":23,
    "PS":20, //-12
    "Open Vld":18, //+5
    "VB":17, // un député est passé de VB à NVA en cours de législature (je le compte ici dans VB)
    "sp.a":14,
    "CDh":10,
    "ecolo":8,
    "N-VA":7, // difficile de savoir comment se répartissent cd&v et nva dont le cartel a explosé en cours de législature + un député est passé de VB à NVA  (je le compte ici dans VB)
    "LDd":5,
    "GROEN!":4,
    "FN":1
   },
   sena : {
    "CD&V":12, //+7
    "MR":10,
    "PS":9, //-12
    "Open Vld":9, //+5
    "VB":8, //+4
    "sp.a":6,
    "CDh":5,
    "ecolo":5,
    "N-VA":2, // -20
    "LDd":1,
    "GROEN!":3,
    "FN":1
   },
   dePart : "PS", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "CD&V":true
   },
   perdants : { // progressions
     "sp.a":true
   },
   progrInit : {
    "N-VA":{
      require:["CD&V"],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "CD&V":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "sp.a":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "Open Vld":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "VB":{
      require:[],
      reject:[],
      consti:true,
      insti:true,
      lingequi:false
    },
    "GROEN!":{
      require:["ecolo"],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "LDd":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:true,
      lingequi:false
    },
    "PS":{
      require:[],
      reject:["VB","LDd"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "MR":{
      require:[],
      reject:["VB","LDd"],
      consti:true,
      insti:false,
      lingequi:false
    },
    "CDh":{
      require:[],
      reject:["VB","LDd"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "ecolo":{
      require:[],
      reject:["VB","LDd"],
      consti:true,
      insti:false,
      lingequi:false
    },
    "FN":{
      require:[],
      reject:["VB","LDd"],
      consti:false,
      insti:false,
      lingequi:false
    }
   },
   specCoa : {
    "centre-droit ou grande suédoise":{type:"D", partys:["libéraux"   ,"centristes", "N-VA"]},
    "bourguignonne": {type:"D", partys:["libéraux"   ,"N-VA", "socialistes"]},
	
    "lilas ou arménienne":{type:"A", partys:["libéraux","centristes","PS"]},
    "orange sanguine":{type:"A", partys:["libéraux","CVP","CD&V N-VA","CD&V","PS"]}	
   },
   critCordon : true,
   critWinners : true,
   critLosers : true,
   critBigFish : true,
   critFamilies : false,
   critBigFamily : true,
   critInsti : false,
   minLangPC : 45,
   hideRedun : false,
   actualGouv : [{"Open Vld":true, "CD&V":true, "N-VA":true, "MR":true, "PS":true, "CDh":true},
                 {"Open Vld":true, "CD&V":true, "MR":true, "PS":true, "CDh":true}],
   actualRefoGouv : {"Open Vld":true, "CD&V":true, "N-VA":true, "MR":true, "PS":true, "CDh":true, "ecolo":true}
  };
