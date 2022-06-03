const discord = require("discord.js");

module.exports.run = async (client, message, args) => {

    const row = new discord.MessageActionRow().addComponents(

        new discord.MessageButton()
        .setLabel("YouTube")
        .setStyle("LINK")
        .setURL("https://www.youtube.com/channel/UCBJZR7KAJUziCYDZpNwm2Nw"),

        new discord.MessageButton()
        .setLabel("Twitch")
        .setStyle("LINK")
        .setURL("https://www.twitch.tv/zsmoes"),

        new discord.MessageButton()
        .setLabel("Instagram")
        .setStyle("LINK")
        .setURL("https://www.instagram.com/d_st_d/"),

        new discord.MessageButton()
        .setLabel("Twitter")
        .setStyle("LINK")
        .setURL("https://twitter.com/SmoesW")

        

        

    );

    message.channel.send({content: "**Sociale Media:**", components: [row]});

}

module.exports.help = {
    name: "social",
    category: "general",
    description: "Socials"
    
}