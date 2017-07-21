# Login

```
email : admin@admin.fr
password : admin
(Password crypt algorithm : Bcrypt)
```

# API Pokedex Zend

## Public

### Add Location

```bash
http://zend.devprod.fr/api/location/add?id=001&lat=48.986463199999996&long=2.4497720999999997
```

## Admin

## List Pokemon

```bash
http://zend.devprod.fr/api/pokemons
```

## Add Pokemon

```bash
http://zend.devprod.fr/api/pokemon/add?national_id=158&name=Kaiminus&description=Malgr%C3%A9%20son%20tout%20petit%20corps,%20la%20m%C3%A2choire%20de%20Kaiminus...&type1=5&type2=4&previous_pokemon=0
```

## Show Pokemon

```bash
http://zend.devprod.fr/api/pokemon/show?name=Evoli
```

## Edit Pokemon

```bash
http://zend.devprod.fr/api/pokemon/edit?national_id=025&name=Pikachu&description=Nouvelle%20description&type1=10&type2=4&previous_pokemon=0
```

## Delete Pokemon

```bash
http://pokedex.zend/api/pokemon/delete?name=Raichu
```