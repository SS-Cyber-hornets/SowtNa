# **Project Model**

## Users

### Admin

Fname, Lname, Password, Email,image

### Artist

Fname, Lname,Stage name, Password, Email,image, Bio, Label, Album_id, Group_id, Track_id,Image, phone number

### Listerner

Fname, Lname, Password, Email,image, Bio, phone number, playlist_id

## MUSIC

### Track

name, Album_id, Artist_id, Duration,Source, Cover, Fav_id, Category_id

### PLAYLIST

Track_id, User_id, Artist_id, Name, Description

### PLAYER

Track_id, User_id, Artist_id

### Category

name

### Tag

name

### Album

Track_id, Artist_id, Cover, Duration

### Label

Name, Bio, Album_id, Track_id, Artist_id, Category_id, group_id

### Group

Name, Bio, Track_id, Artist_id, Category_id

### Lyrics

Description, Track_id, Artist_id

### Download

Track_id, User_id

### Charts

Name, Description, Track_id, chartType_id

### Chart Type

Name

### Comment

Description,Track_id, User_id

### Share

Track_id, User_id

## OTHER FEATURRE

### Treading

Track_id, Album_id

### Favorite

user_id, artist_id, track_id, album_id

### Follow

User_id, Artist_id, counts

***Note: You can add,remove and update the models***

> #### *Stephen* :smile
