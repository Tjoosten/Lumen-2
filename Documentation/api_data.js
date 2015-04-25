define({ "api": [
  {
    "name": "Define_the_application_s_command_schedule_",
    "group": "CLI_Artisan_Commands",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Illuminate\\Console\\Scheduling\\Schedule",
            "description": "<p>$schedule</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "void",
            "description": ""
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "filename": "API-source-code/app/Console/Kernel.php",
    "groupTitle": "CLI_Artisan_Commands"
  },
  {
    "name": "Execute_the_console_command__api_newUser__",
    "group": "CLI_Artisan_commands",
    "version": "1.0.0",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "The",
            "description": "<p>user is created</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "string",
            "optional": false,
            "field": "WARNING",
            "description": "<p>: Invalid option or handling cancelled.</p> "
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "filename": "API-source-code/app/Console/Commands/newUser.php",
    "groupTitle": "CLI_Artisan_commands"
  },
  {
    "name": "report",
    "description": "<p>Report or log an exception.</p> ",
    "group": "Exception_handler_",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Exception",
            "description": "<p>$e</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "void",
            "description": ""
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "filename": "API-source-code/app/Exceptions/Handler.php",
    "groupTitle": "Exception_handler_"
  },
  {
    "name": "render",
    "description": "<p>Render an exception into an HTTP response.</p> ",
    "group": "Exception_handler",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Illuminate\\Http\\Request",
            "description": "<p>$request</p> "
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Exception",
            "description": "<p>$e</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "\\Illuminate\\Http\\Response",
            "description": ""
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "filename": "API-source-code/app/Exceptions/Handler.php",
    "groupTitle": "Exception_handler"
  },
  {
    "type": "get",
    "url": "/graveyards/all",
    "title": "get all the graveyards.",
    "name": "graveyards__all_",
    "description": "<p>Get a all the graveyards.</p> ",
    "group": "Graveyards",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Boolean",
            "optional": false,
            "field": "error",
            "description": "<p>Error detection.</p> "
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Error Message.</p> "
          }
        ]
      }
    },
    "filename": "API-source-code/app/Http/Controllers/ApiBegraafplaatsen.php",
    "groupTitle": "Graveyards"
  },
  {
    "type": "get",
    "url": "/graveyard/{id}",
    "title": "get a specific graveyard.",
    "name": "graveyards__specific_",
    "description": "<p>Get a specific graveyard.</p> ",
    "group": "Graveyards",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "filename": "API-source-code/app/Http/Controllers/ApiBegraafplaatsen.php",
    "groupTitle": "Graveyards"
  },
  {
    "name": "handle",
    "description": "<p>Handle an incoming request..</p> ",
    "group": "Middleware_",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Illuminate\\Http\\Request",
            "description": "<p>$request</p> "
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "\\Closure",
            "description": "<p>$next</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "mixed",
            "description": ""
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "filename": "API-source-code/app/Http/Middleware/ExampleMiddleware.php",
    "groupTitle": "Middleware_"
  },
  {
    "type": "get",
    "url": "/soldiers/{id}",
    "title": "get a specific soldier.",
    "name": "getSoldier",
    "description": "<p>Get a specific soldier</p> ",
    "group": "Soldiers",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>The api off the soldier.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>The soldier his DB id.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Voornaam",
            "description": "<p>The firstname.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Achternaam",
            "description": "<p>The lastname.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geslacht",
            "description": "<p>The gender .</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Burgerlijke_stand",
            "description": "<p>The relation status</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geboren_plaats",
            "description": "<p>The place of birth.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geboren_daatum",
            "description": "<p>The date from birth.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_plaats",
            "description": "<p>The place of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_datum",
            "description": "<p>The date of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_locatie",
            "description": "<p>The location of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Doodsoorzaak",
            "description": "<p>The Cause of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Graf_referentie",
            "description": "<p>The grave number.</p> "
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "herdenking_id",
            "description": "<p>The id of the graveyard.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Begraafplaats",
            "description": "<p>The graveyard</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Lengtegraad",
            "description": "<p>Lengtegraad van het kerkhof.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Breedtegraad",
            "description": "<p>Breedtegraad van het kerkhof.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Type",
            "description": "<p>Type graveyard.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Rang",
            "description": "<p>Military rank</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Dienst",
            "description": "<p>Service year.</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Eenheid",
            "description": "<p>Service country.</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Stam_nr",
            "description": "<p>Service number.</p> "
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "regiment_id",
            "description": "<p>The id of the regiment.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "regiment",
            "description": "<p>The regiment</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Notitie",
            "description": "<p>Notation about the soldier.</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Boolean",
            "optional": false,
            "field": "error",
            "description": "<p>Error detectation.</p> "
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error message.</p> "
          }
        ]
      }
    },
    "filename": "API-source-code/app/Http/Controllers/ApiSoldiers.php",
    "groupTitle": "Soldiers"
  },
  {
    "type": "get",
    "url": "/soldier/all",
    "title": "getting all the soldiers.",
    "name": "getSoldiers",
    "description": "<p>Get all the soldiers</p> ",
    "group": "Soldiers",
    "permission": [
      {
        "name": "none"
      }
    ],
    "version": "1.0.0",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>The soldier his DB id.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Voornaam",
            "description": "<p>The firstname.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Achternaam",
            "description": "<p>The lastname.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geslacht",
            "description": "<p>The gender .</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Burgerlijke_stand",
            "description": "<p>The relation status</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geboren_plaats",
            "description": "<p>The place of birth.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Geboren_daatum",
            "description": "<p>The date from birth.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_plaats",
            "description": "<p>The place of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_datum",
            "description": "<p>The date of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Overleden_locatie",
            "description": "<p>The location of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Doodsoorzaak",
            "description": "<p>The Cause of death.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Graf_referentie",
            "description": "<p>The grave number.</p> "
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "herdenking_id",
            "description": "<p>The id of the graveyard.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Begraafplaats",
            "description": "<p>The graveyard</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Lengtegraad",
            "description": "<p>Lengtegraad van het kerkhof.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Breedtegraad",
            "description": "<p>Breedtegraad van het kerkhof.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Type",
            "description": "<p>Type graveyard.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Rang",
            "description": "<p>Military rank</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Dienst",
            "description": "<p>Service year.</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Eenheid",
            "description": "<p>Service country.</p> "
          },
          {
            "group": "Success 200",
            "type": "string",
            "optional": false,
            "field": "Stam_nr",
            "description": "<p>Service number.</p> "
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "regiment_id",
            "description": "<p>The id of the regiment.</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "regiment",
            "description": "<p>The regiment</p> "
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "Notitie",
            "description": "<p>Notation about the soldier.</p> "
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "type": "Boolean",
            "optional": false,
            "field": "error",
            "description": "<p>Error detectation.</p> "
          },
          {
            "group": "Error 4xx",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>The error message.</p> "
          }
        ]
      }
    },
    "filename": "API-source-code/app/Http/Controllers/ApiSoldiers.php",
    "groupTitle": "Soldiers"
  }
] });