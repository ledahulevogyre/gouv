  var leg1999 = {
   chamb : {
    "VLD":23,   
    "CVP":22,   
    "PS":19,    
    "MR":18,    
    "VB":15,    
    "SP":14,    
    "ecolo":11, 
    "PSC":10,   
    "AGALEV":9, 
    "VU":8,     
    "FN":1      
   },
  sena : {
    "VLD":12,
    "CVP":10,
    "PS":10,
    "MR":9,
    "VB":6,
    "SP":7,
    "ecolo":6,
    "AGALEV":4,
    "PSC":5,
    "VU":2,
    "FN":0
   },
   dePart : "PS", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "ecolo":true,
    "AGALEV":true
   },
   perdants : { // progressions
    "CVP":true
   },
   progrInit : {
    "VLD":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "CVP":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "SP":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "VB":{
      require:[],
      reject:[],
      consti:false,
      insti:false,
      lingequi:true
    },
    "AGALEV":{
      require:["ecolo"],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "VU":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "PS":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "MR":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "PSC":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "ecolo":{
      require:["AGALEV"],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "FN":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    }
   },
   specCoa : {},
   
   critCordon : true,
   critWinners : true,
   critLosers : true,
   critBigFish : true,
   critFamilies : true,
   critBigFamily : true,
   critInsti : false,
   minLangPC : 50,
   hideRedun : true,
   actualGouv : {"VLD":true, "MR":true, "PS":true, "SP":true, "AGALEV":true, "ecolo":true},
   actualRefoGouv : {}
  };
