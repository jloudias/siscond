# Generated by Django 4.2.1 on 2023-06-23 12:52

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('frontend', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='carousel',
            name='caption_align',
            field=models.CharField(default='text-start', max_length=15),
        ),
    ]