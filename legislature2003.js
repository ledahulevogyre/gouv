  // 2003
  var leg2003 = {
   chamb : {
    "VLD":25,   // +2
    "sp.a-spirit":23,    // +9
    "CD&V":21,   // -1
    "PS":25,    // +6
    "VB":18,    // +3
    "MR":24,    // +6
    "CDh":8,   // -2
    "N-VA":1,     // -7
    "ecolo":4, // -5
    "FN":1     
   },
  sena : {
    "VLD":11,   // +2
    "sp.a-spirit":12,    // +9
    "CD&V":9,   // -1
    "PS":11,    // +6
    "VB":9,    // +3
    "MR":11,    // +6
    "CDh":4,   // -2
    "N-VA":0,     // -7
    "ecolo":2, // -5
    "FN":2
   },
   dePart : "MR", // le parti du sénateur germanophone (siège à décompter pour atteindre la majorité francophone)
   gagnants : { // progressions
    "sp.a-spirit":true,
    "PS":true
   },
   perdants : { // progressions
    "ecolo":true
   },
   progrInit : {
    "VLD":{
      require:[],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "CD&V":{
      require:["N-VA"],
      reject:["VB"],
      consti:false,
      insti:false,
      lingequi:true
    },
    "sp.a-spirit":{
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
    "N-VA":{
      require:["CD&V"],
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
    "CDh":{
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
   specCoa : {
    "centre-droit ou grande suédoise":{type:"D", partys:["libéraux"   ,"centristes", "N-VA"]},
    "bourguignonne": {type:"D", partys:["libéraux"   ,"N-VA", "socialistes"]},
	
    "orange sanguine":{type:"A", partys:["libéraux","CVP","CD&V N-VA","CD&V","PS"]}		   
   },
   critCordon : true,
   critWinners : true,
   critLosers : true,
   critBigFish : true,
   critFamilies : true,
   critBigFamily : true,
   critInsti : false,
   minLangPC : 50,
   hideRedun : true,
   actualGouv : {"VLD":true, "MR":true, "PS":true, "sp.a-spirit":true},
   actualRefoGouv : {}
  };
