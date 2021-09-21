# General

Now you can share your Coordinates and Item with Prefix

# Example

if you type [i] in message, later it will be automatically replaced into the name of the item in your hand

Example: hello pvp with me but using [i]
Result: If in your hand Iron Sword Will Be, hello pvp with me but using Iron Sword

if you type [coor] in message, later it will be automatically replaced into the Your coordinates

Example: hello to coordinate [coor], let's go
Result: hello to coordinate X: 178, Y: 90, Z: 167, let's go

Format and prefix can your change in Config

# Config

``` YAML

---
# use {name} to player name
# use {item} to item name

item-msg: "Name: {item} "

#use {name} to player name
#use {x} to get player X
#use {y} to get player Y
#use {z} to get player Z

coor-msg: "X: {x} Y: {y} Z: {z}"

#this is [i] message can be repace to item-msg
#orginal is [i]
# You can add Your custom

item-prefix: 
 - "[i]"


#this is [coor] message can be replace to coor-msg
#original is [coor]
# You can add Your Custom

coor-prefix: 
 - "[coor]"
...
```

# Additional Notes

- If you find bugs or want to give suggestions, please visit [here](https://github.com/ItsRealNise/SharedItems-Coords/issues)
