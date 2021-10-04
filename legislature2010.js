  
  // 2010
  var leg2010 = {
   chamb : {
    "N-VA":27,
    "PS":26,
    "MR":15,
    "CD&V":17,
    "sp.a":13,
    "Open Vld":13,
    "VB":12,
    "CDh":9,
    "ecolo":8,
    "GROEN!":5,
    "FDF":3,
    "LDd":1,
    "PP":1
   },
   sena : {
    "N-VA":14,
    "PS":13,
    "MR":8,
    "CD&V":7,
    "sp.a":7,
    "Open Vld":6,
    "VB":5,
    "CDh":4,
    "ecolo":5,
    "GROEN!":2,
    "FDF":0,
    "LDd":0,
    "PP":0
   },
   dePart : "PS", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "N-VA":true,
    "PS":true
   },
   perdants : { // régressions
    "Open Vld":true,
    "MR":true,
    "VB":true
   },
   progrInit : {
    "N-VA":{
      require:[],
      reject:["VB", "FDF"],
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
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "MR":{
      require:[],
      reject:["VB"],
      consti:true,
      insti:false,
      lingequi:false
    },
    "CDh":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "ecolo":{
      require:["GROEN!"],
      reject:["VB"],
      consti:true,
      insti:false,
      lingequi:false
    },
    "FDF":{
      require:[],
      reject:["VB", "N-VA"],
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
    "«les 9»":{type:"D", partys:["N-VA","PS","sp.a","Open Vld","MR","CD&V","CDh","ecolo","GROEN!"]},
    "«les 7»":{type:"D", partys:["N-VA","PS","sp.a","CD&V","CDh","ecolo","GROEN!"]},
    "miroir (des exécutifs régionaux)":{type:"A", partys:["CD&V","sp.a", "N-VA","PS", "CDh", "ecolo"]},

    "centre-droit ou grande suédoise":{type:"D", partys:["libéraux"   ,"centristes", "N-VA"]},
    "bourguignonne": {type:"D", partys:["libéraux"   ,"N-VA", "socialistes"]},
	
    "lilas ou arménienne":{type:"A", partys:["libéraux","centristes","PS"]},
    "orange sanguine":{type:"A", partys:["libéraux","CVP","CD&V N-VA","CD&V","PS"]}
   },
   critCordon : true,
   critWinners : false,
   critLosers : false,
   critBigFish : false,
   critFamilies : true,
   critBigFamily : true,
   critInsti : false,
   minLangPC : 45,
   hideRedun : true,
   actualGouv : {"Open Vld":true, "CD&V":true, "sp.a":true, "MR":true, "PS":true, "CDh":true},
   actualRefoGouv : {"Open Vld":true, "CD&V":true, "sp.a":true, "MR":true, "PS":true, "CDh":true, "ecolo":true, "GROEN!":true}
  };
