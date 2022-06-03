const discord = require("discord.js");


module.exports.run = async (client, message, args) => {

    var botEmbed = new discord.MessageEmbed()
    .setTitle("Guardian Bot")
    .setDescription("idk")
    .setColor("DARK_GOLD")
    .addFields(
        { name: "Bot naam", value: client.user.username },
        { name: "Je bent de server gejoined op", value: message.member.joinedAt.toString() },
        { name: "Aantal Members", value: message.guild.memberCount.toString() }
    );

   
    return message.channel.send({embeds: [botEmbed]});
}

module.exports.help = {
    name: "serverinfo",
    category: "info",
    description: "Geeft informatie over de server."
    
}