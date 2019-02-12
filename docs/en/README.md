# IPSymconAirVisual
[![Version](https://img.shields.io/badge/Symcon-PHPModule-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-%3E%205.1-green.svg)](https://www.symcon.de/en/service/documentation/installation/)

Module for IP-Symcon version 5.1 or higher allows you to read the values of AirVisual.

## Documentation

**Table of Contents**

1. [Features](#1-features)
2. [Requirements](#2-requirements)
3. [Installation](#3-installation)
4. [Function reference](#4-functionreference)
5. [Configuration](#5-configuration)
6. [Annex](#6-annex)

## 1. Features

The module lets you read values from AirVisual and display the map in IP-Symcon (version 5.1 or higher).

### Display:

- AirVisual Earth 3D
- air quality
- temperature
- wind speed
- wind direction

## 2. Requirements

 - IPS 4.3
 - [API Key AirVisual](https://www.airvisual.com/api "API Key AirVisual")

## 3. Installation

### a. Loading the module

Open the IP Console's web console with _http://<IP-Symcon IP>:3777/console/_.

Then click on the module store icon (IP-Symcon > 5.1) in the upper right corner.

![Store](img/store_icon.png?raw=true "open store")

In the search field type

```
AirVisual
```  


![Store](img/module_store_search_en.png?raw=true "module search")

Then select the module and click _Install_

![Store](img/install_en.png?raw=true "install")


#### Install alternative via Modules instance

_Open_ the object tree.

![Objektbaum](img/object_tree.png?raw=true "object tree")	

Open the instance _'Modules'_ below core instances in the object tree of IP-Symcon (>= Ver 5.x) with a double-click and press the _Plus_ button.

![Modules](img/modules.png?raw=true "modules")	

![Plus](img/plus.png?raw=true "Plus")	

![ModulURL](img/add_module.png?raw=true "Add Module")
 
Enter the following URL in the field and confirm with _OK_:


```	
https://github.com/Wolbolar/IPSymconAirVisual
```
    
and confirm with _OK_.    
    
Then an entry for the module appears in the list of the instance _Modules_

By default, the branch _master_ is loaded, which contains current changes and adjustments.
Only the _master_ branch is kept current.

![Master](img/master.png?raw=true "master") 

If an older version of IP-Symcon smaller than version 5.1 (min 4.3) is used, click on the gear on the right side of the list.
It opens another window,

![SelectBranch](img/select_branch_en.png?raw=true "select branch") 

here you can switch to another branch, for older versions smaller than 5.1 (min 4.3) select _Old-Version_ .

### b.  Setup in IP-Symcon

In IP-Symcon _add Instance_ (_rightclick -> add object -> instance_) under the category under which you want to add the AirVisual instance,
and select _AirVisual_.
In the configuration form, enter the AirVisual API Key and select a suitable location.


## 4. Function reference

### AirVisual:

Functions see Annex.

### Webfront:
	
![Webfront](img/AirVisual.png?raw=true "Webfront")

## 5. Configuration:

### AirVisual:

| Property    | Type    | Value        | Function                                  |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| api_key     | string  |              | Air Visual API Key                        |

## 6. Annex

###  a. Functions:

#### AirVisual:

`AirVisual_DataUpdate(integer $InstanceID)`

Updates the data

`AirVisual_GetSelectionCountries(integer $InstanceID)`

Get a list of available countries

`AirVisual_GetCityData(integer $InstanceID, string $city, string $state, string $country)`

Collects data for a city

`AirVisual_GetNearestCityData(integer $InstanceID)`

Collects data for a nearest city with data

###  b. GUIDs and data exchange:

#### AirVisual:

GUID: `{6F94356B-0847-2EA9-7E93-32FDD6ABFD76}` 

### c. Sources

[AirVisual API](https://www.airvisual.com/api "AirVisual API")



