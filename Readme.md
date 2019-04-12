# DIU.Grid Plugin

## What is the DIU.Grid Plugin?
The DIU.Grid Plugin is a plugin for neos cms that provides the a 12 column grid system as a basic structure. This kind of grid system is found on many web pages.
The css structure is based on bootstrap 4.x. The static resources are not added in this project.

## Installation
`composer require diu/grid`

* Version 2.x is for Neos 4.1,4.2,3.3
* Version 3.x is for Neos 4.2 and upcoming


## How to use the DIU.Grid Plugin?
1. Require the package in your composer.json file.
2. Allow sections as childnodes in your content elements.
3. Override the constraints for the grid content elements.
4. Add in your site package necessary layouts

e.g.: 
```
0-4-4-4 => 3 equal columns no beginning offset
2-4-4-2 => 3 columns, two 4 cols and one 2 cols with an beginning offset of two cols
```

###### TODO:
* Add example for override
