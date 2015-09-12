<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1" style="width: 400px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nation Name</th>
                    <th>Create At</th>
                    <th>Update At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->FindAll() as $m) : ?>
                    <tr>
                        <td><?= $m->id ?></td>
                        <td><?= $m->nation_name ?></td>
                        <td><?= $m->create_at ?></td>
                        <td><?= $m->update_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
