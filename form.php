<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cat Meter</title>
</head>
<body>
    <form action="https://catbreeds.appspot.com/" method="post">
        <div class="field">
            <label for="breed_name">Breed Name</label>
            <input type="text" name="breed_name" id="breed_name">
        </div>
        <div class="field">
            <label for="friendliness">Friendliness</label>
            <input type="text" name="friendliness" id="friendliness">
        </div>
        <div class="field">
            <label for="playfulness">Playfulness</label>
            <input type="text" name="playfulness" id="playfulness">
        </div>
        <div class="field">
            <label for="activity">Activity</label>
            <input type="text" name="activity" id="activity">
        </div>
        <div class="field">
            <label for="intelligence">Intelligence</label>
            <input type="datetime" name="intelligence" id="intelligence">
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
