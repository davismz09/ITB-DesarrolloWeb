package com.example.appsmovilesdse08

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatButton
import com.example.appsmovilesdse08.appSaludo.SaludoActivity
import com.example.appsmovilesdse08.imc.ImcActivity

class MenuActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_menu)
        val btnSaludo: AppCompatButton = findViewById(R.id.btnSaludo)
        val btnImc: AppCompatButton = findViewById(R.id.btnImc)

        initApp(btnSaludo, SaludoActivity::class.java)
        initApp(btnImc, ImcActivity::class.java)
    }

    private fun initApp(button: AppCompatButton, activityDestino: Class<*>) {
        button.setOnClickListener {
            val intent = Intent(this, activityDestino)
            startActivity(intent)
        }
    }
}