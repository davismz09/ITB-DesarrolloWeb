package com.example.rickandmortyapi.rickmorty

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.rickandmortyapi.R

class PersonajeAdapter(val personajes: List<Map<String, String>>) :
    RecyclerView.Adapter<PersonajeViewHolder>() {
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): PersonajeViewHolder {
        val layoutInflater = LayoutInflater.from(parent.context)
        return PersonajeViewHolder(layoutInflater.inflate(R.layout.item_personaje, parent, false))
    }

    override fun getItemCount(): Int = personajes.size

    override fun onBindViewHolder(holder: PersonajeViewHolder, position: Int) {
        val item: Map<String, String> = personajes[position]
        holder.bind(item)
    }
}