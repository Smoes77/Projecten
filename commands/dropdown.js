const discord = require("discord.js");

module.exports.run = async (client, message, args) => {

    const options = [
        {
            label: "13-17",
            value: "947184345100189737"
        },
        {
            label: "18+",
            value: "947184399827472475"
        }
    ]

    const row = new discord.MessageActionRow()
    .addComponents(
        new discord.MessageSelectMenu()
        .setCustomId("roles")
        .setMinValues(0)
        .setMaxValues(1)
        .setPlaceholder("Selecteer je leeftijds Catogorie")
        .addOptions(options)
    );

    return message.channel.send({content: "Selecteer je leeftijd", components: [row]});

}

module.exports.help = {
    name: "dropdown",
    category: "general",
    description: "Dropdown"
    
}