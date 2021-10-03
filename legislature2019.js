
  // 2019
  var leg2019 = {
   chamb : {
    "PTB":8,
    "PVDA":4,
    "ecolo":12,
    "GROEN!":9,
    "PS":19,
    "sp.a":9,
    "CDh":5,
    "CD&V":12,
    "DéFI":2,
    "MR":14,
    "Open Vld":12,
    "N-VA":25,
    "VB":18,
    "Kir":1,
   },
   sena : {
    "N-VA":9,
    "PS":7,
    "MR":7,
    "CD&V":5,
    "Open Vld":5,
    "sp.a":4,
    "CDh":2,
    "ecolo":5,
    "GROEN!":4,
    "VB":7,
    "DéFI":0,
    "PTB":4,
    "PVDA":1,
	"Kir":0
   },
   dePart : "MR", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "ecolo":true,
    "GROEN!":true,
    "PTB":true,
    "PVDA":true,
    "VB":true
   },
   perdants : { // régressions
    "N-VA":true,
	"CDh":true
   },
progrInit : {
    "N-VA":{
      require:[],
      reject:["PS","ecolo","PTB","DéFI"],
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
    "PTB":{
      require:["PVDA"],
      reject:["VB", "N-VA", "MR", "Open Vld", "PP"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "PVDA":{
      require:["PTB"],
      reject:["VB", "N-VA", "MR", "Open Vld", "PP"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "PS":{
      require:[],
      reject:["VB","PP"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "MR":{
      require:[],
      reject:["VB", "PTB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "CDh":{
      require:[],
      reject:["VB", "PTB"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "ecolo":{
      require:["GROEN!"],
      reject:["VB", "PP", "N-VA"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "DéFI":{
      require:[],
      reject:["VB", "N-VA"],
      consti:false,
      insti:false,
      lingequi:false
    },
    "Kir":{
      require:[],
      reject:[],
      consti:false,
      insti:false,
      lingequi:false
    }
   },
   specCoa : {
    "Vivaldi/4 saisons diminuée":{type:"A",
	           partys:[
      "socialistes", 
      "libéraux", 
      "CD&V", 
      "verts"]},
    "Arizona": {type:"A", partys:["libéraux", "centristes", "N-VA", "sp.a"]}, 
    "miroir (des exécutifs régionaux)":{type:"A", partys:["CD&V", "N-VA", "Open Vld","PS", "MR", "ecolo"]},
    "centre-droit diminuée":{type:"A", partys:["CD&V", "N-VA", "CDh", "MR"]},
    "suédoise ou kamikaze":{type:"A", partys:["CD&V", "N-VA", "Open Vld", "MR"]},
    "lilas ou arménienne":{type:"A", partys:["libéraux","centristes","PS"]},	
    "orange sanguine":{type:"A", partys:["libéraux","CVP","CD&V N-VA","CD&V","PS"]}
   },
   critCordon : false,
   critWinners : false,
   critLosers : true,
   critBigFish : false,
   critFamilies : false,
   critBigFamily : false,
   critInsti : false,
   minLangPC : 45,
   hideRedun : true,
   actualGouv : {"CD&V":true, "Open Vld":true, "sp.a":true, "GROEN!":true, "PS":true, "MR":true, "ecolo":true},
   actualRefoGouv : {}
  } 
