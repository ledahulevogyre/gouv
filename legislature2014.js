  // 2014
  var leg2014 = {
   chamb : {
    "PTB-GO !":2,
    "ecolo":6,
    "GROEN!":6,
    "PS":23,
    "sp.a":13,
    "CDh":9,
    "CD&V":18,
    "FDF":2,
    "MR":20,
    "Open Vld":14,
    "N-VA":33,
    "VB":3,
    "PP":1
   },
   sena : {
    "N-VA":12,
    "PS":9,
    "MR":9,
    "CD&V":8,
    "Open Vld":5,
    "sp.a":5,
    "CDh":4,
    "ecolo":3,
    "GROEN!":3,
    "VB":2,
    "FDF":0,
    "PTB-GO !":0,
    "PP":0
   },
   dePart : "MR", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "N-VA":true
   },
   perdants : { // régressions
    "VB":true,
    "ecolo":true
   },
   progrInit : {
    "N-VA":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:false,
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
      consti:false,
      insti:false,
      lingequi:false
    },
    "Open Vld":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
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
      consti:false,
      insti:false,
      lingequi:false
    },
    "PTB-GO !":{
      require:[],
      reject:["VB", "N-VA", "MR", "Open Vld", "PP"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "PS":{
      require:[],
      reject:["VB","PP","N-VA"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "MR":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "CDh":{
      require:[],
      reject:["VB","N-VA"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "ecolo":{
      require:["GROEN!"],
      reject:["VB", "PP"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "FDF":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "PP":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:false
    }
   },
   specCoa : {
    "centre-droit ou grande suédoise":{type:"D", partys:["libéraux"   ,"centristes", "N-VA"]},
    "bourguignonne": {type:"D", partys:["libéraux"   ,"N-VA", "socialistes"]},
	
    "miroir (des exécutifs régionaux)":{type:"A", partys:["CD&V", "N-VA","PS", "CDh"]},
    "centre-droit diminuée":{type:"A", partys:["CD&V", "N-VA", "CDh", "MR"]},
	
    "suédoise ou kamikaze":{type:"A", partys:["CD&V", "N-VA", "Open Vld", "MR"]},
    "lilas ou arménienne":{type:"A", partys:["libéraux","centristes","PS"]},
    "orange sanguine":{type:"A", partys:["libéraux","CVP","CD&V N-VA","CD&V","PS"]}
   },
   critCordon : true,
   critWinners : true,
   critLosers : true,
   critBigFish : false,
   critFamilies : false,
   critBigFamily : false,
   critInsti : false,
   minLangPC : 30,
   hideRedun : true,
   //actualGouv : {"Open Vld":true, "CD&V":true, "sp.a":true, "MR":true, "PS":true, "CDh":true},
   actualGouv : {"CD&V":true, "N-VA":true, "Open Vld":true, "MR":true},
   actualRefoGouv : {}
  };
