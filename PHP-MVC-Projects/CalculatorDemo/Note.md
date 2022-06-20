# Calculator Demo
## Points:
- **File system organization**: 'Classes'->(Templates storage), 'Includes'->(request/data processing), 'Views'->(show to users)
- **(Templates) Classes declaration**: properties(*call by using '->' without'$'*(inside class use $this)); __construct(params); class methods; static property(*call by using **classname**'::$'propertyname* (inside class classname use **self**, if call parent's, use **parent**)); fields scope(public, private, protect) 
- **Auto include method**: leverage 'spl_autoload_register(*function*)' to load all the classes in the Class folder.

## Error(fixed):
- **Include path**: unable to find the class file.(*Problem*: wrong file name; *Solution*: correct the file name, ensure the correct relative path)