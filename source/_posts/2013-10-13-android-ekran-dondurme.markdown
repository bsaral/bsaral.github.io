---
layout: post
title: "Android-Ekran Dönüşünü Engelleme"
date: 2013-10-28 10:21
comments: true
categories: Teknik
---

Android uygulamalarında tasarlanan ekran görünümü, ekranın yatay veya dikey konuma çevrilmesiyle görünümde sorunlara yol açabilir. Ekran dönüşümünü engellemek için screenOrientation özelliğini nosensor olarak ayarlamamız gerekir.

{% codeblock AndroidManifest.xml lang:xml %}
<?xml version="1.0" encoding="utf-8"?>
<manifest xmlns:android="http://schemas.android.com/apk/res/android"
    package="com.example.mwe"
    android:versionCode="1"
    android:versionName="1.0" >

    <uses-sdk
        android:minSdkVersion="8"
        android:targetSdkVersion="17" />

    <application
        android:allowBackup="true"
        android:icon="@drawable/ic_launcher"
        android:label="@string/app_name"
        android:theme="@style/AppTheme" >
        <activity
            android:name="com.example.mwe.MainActivity"
            android:label="@string/app_name"
            android:screenOrientation="nosensor"> <!-- BU SATIRDAKİ KOD KULLANILIR -->
            <intent-filter>
                <action android:name="android.intent.action.MAIN" />

                <category android:name="android.intent.category.LAUNCHER" />
            </intent-filter>
        </activity>
     </application>

</manifest>
{% endcodeblock %}